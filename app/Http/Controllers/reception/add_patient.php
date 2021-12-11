<?php

namespace App\Http\Controllers\reception;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTime;

class add_patient extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Sets up required items before loading reception home page.

    function set_up_home(Request $request){

        session(['PATIENT_TYPE' => 'new']);

        date_default_timezone_set('Asia/Dhaka');
        $date = date("Y-m-d");
        $request->session()->put('DATE_TODAY',$date);

        $user_id = $request->session()->get('REC_SESSION_ID');

        # Getting reception info.
        $result=DB::table('receptionists')->where('R_ID',$user_id)->get();

        $request->session()->put('R_NAME',$result[0]->R_Name);

        # Getting account variables.
        $acc_var=DB::table('account_variables')->orderBy('AI_ID','desc')->first();

        session(['VAT' => $acc_var->Vat]);
        session(['COMMISSION' => $acc_var->Commission]);
        session(['DENTAL_HOSPITAL_PERCENTAGE' => $acc_var->Dental_Hospital_Percentage]);
        session(['PATHOLOGY_HOSPITAL_PERCENTAGE' => $acc_var->Pathology_Hospital_Percentage]);
        session(['PHYSIO_HOSPITAL_PERCENTAGE' => $acc_var->Physio_Hospital_Percentage]);
        $request->session()->put('KernelPoint','reception');

        session(['test_pathology' => 'Pathology']);
        session(['test_hormone' => 'Hormone']);
        session(['test_usg' => 'Ultrasonography']);
        session(['test_xray' => 'X-Ray']);
        session(['test_more' => 'Others']);
        session(['test_all' => 'All']);

        # Returning to the view below.
        return view('hospital/reception/home');

    }

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This function has a chance of updating in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::02 ####
#########################
# Retrieves data from form;
# Stores data in 11 sessions.

    function submit_basic_patient_info(Request $request){

        $request->validate([

            'patient_name'=>'required',
            'patient_gender'=>'required',
            'age'=>'required',
            'cell_number'=>'required',
            'nid_type'=>'required',
            'appoint_date'=>'required',
            'ap_type'=>'required',
            'patient_type'=>'required'

        ]);

        $patient_type = $request->input('patient_type');

        date_default_timezone_set('Asia/Dhaka');
        $ap_type = $request->input('ap_type');
        $ap_date = $request->input('appoint_date');
        $timestamp = strtotime($ap_date);
        $day = date('D', $timestamp);
        
        session(['PATIENT_NAME' => $request->input('patient_name')]);
        session(['PATIENT_GENDER' => $request->input('patient_gender')]);
        session(['PATIENT_AGE' => $request->input('age')]);
        session(['PATIENT_CELL' => $request->input('cell_number')]);
        session(['PATIENT_NID' => $request->input('nid')]);
        session(['PATIENT_NID_TYPE' => $request->input('nid_type')]);
        session(['PATIENT_APPOINT_DATE' => $ap_date]);
        session(['PATIENT_APPOINT_DAY' => $day]);
        session(['PATIENT_APPOINT_TYPE' => $ap_type]);
        session(['PATIENT_TYPE' => $patient_type]);

        if($ap_type == 'Appoint-Doctor'){

            $redirect = 'appointment';
            session(['REDIRECT' => $redirect]);

            # Redirecting to [FUNCTION-NO::04].
            return redirect('/reception/doctor_selection/');

        }if($ap_type == 'Admit'){

            $redirect = 'admit';
            session(['REDIRECT' => $redirect]);

            # Redirecting to [FUNCTION-NO::14].
            return redirect('/reception/add_more_info/');

        }if($ap_type == 'Dental'){

            $redirect = 'dental';
            session(['REDIRECT' => $redirect]);
            session(['reg_date' => $ap_date]);

            # Redirecting to [FUNCTION-NO::29].
            return redirect('/reception/test_selection/dental/');

        }if($ap_type == 'Test'){

            $redirect = 'test';
            session(['REDIRECT' => $redirect]);
            session(['reg_date' => $ap_date]);

            # Redirecting to [FUNCTION-NO::39].
            return redirect('/reception/test_selection/pathology/');

        }if($ap_type == 'Physio'){

            $redirect = 'physio';
            session(['REDIRECT' => $redirect]);
            session(['reg_date' => $ap_date]);

            # Redirecting to [FUNCTION-NO::39].
            return redirect('/reception/physio/');

        }

    }

# End of function submit_basic_patient_info.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# This function will lead to 1 other routs in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::03 ####
#########################
# Finds old patient data;
# Stores data in 9 sessions.

    function search_old_patient_from_log(Request $request){

        $old_patient_search_info = $request->input('old_patient_search_info');
        $old_patient_cell = $request->input('old_patient_cell');

        $old_patient_info=DB::table('patients')
        ->where('P_ID', $old_patient_search_info)
        ->orderBy('AI_ID','desc')
        ->first();

        $old_patient_info_2=DB::table('patients')
        ->select('P_ID', 'Patient_Name')
        ->distinct()
        ->where('Cell_Number', $old_patient_cell)
        ->orderBy('AI_ID','desc')
        ->get();

        $count = count($old_patient_info_2);

        if($old_patient_info){

            session(['P_ID' => $old_patient_info->P_ID]);
            session(['PATIENT_NAME' => $old_patient_info->Patient_Name]);
            session(['PATIENT_GENDER' => $old_patient_info->Patient_Gender]);
            session(['PATIENT_AGE' => $old_patient_info->Patient_Age]);
            session(['PATIENT_CELL' => $old_patient_info->Cell_Number]);
            session(['PATIENT_NID' => $old_patient_info->NID]);
            session(['PATIENT_NID_TYPE' => $old_patient_info->NID_Type]);
            session(['PATIENT_TYPE' => 'old']);
            session(['PATIENT_FOUND_BY' => 'id']);

            # Session flash messages.
            $request->session()->flash('msg','Patient Found.');

            # Returning to [VIEW-NO::01].
            return redirect('/reception/home/setup/none');

        }elseif($count > 0){

            session(['PATIENT_TYPE' => 'old']);
            session(['PATIENT_FOUND_BY' => 'cell']);

            $old_patients_found['via_cell']=DB::table('patients')
            ->select('P_ID', 'Patient_Name')
            ->distinct()
            ->where('Cell_Number', $old_patient_cell)
            ->orderBy('AI_ID','desc')
            ->get();

            # Session flash messages.
            $request->session()->flash('msg','Patient Found.');

            # Returning to [VIEW-NO::01].
            return view('hospital/reception/home',$old_patients_found);

        }else{

            # Session flash messages.
            $request->session()->flash('msg','Patient Not Found.');

            # Redirecting to [FUNCTION-NO::01].
            return redirect('/reception/home');

        }
        
        /*$data['old_patients']=DB::table('patient_logs')
        ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
        ->join('doctors', 'patient_logs.D_ID', '=', 'doctors.D_ID')
        ->select('patient_logs.*', 'patients.*', 'doctors.*')
        ->where('patients.P_ID','like','%'.$old_patient_search_info.'%')
        ->orWhere('patients.Cell_Number','like','%'.$old_patient_search_info.'%')
        ->orWhere('patients.NID','like','%'.$old_patient_search_info.'%')
        ->orderBy('patient_logs.AI_ID','desc')
        ->get();*/

    }

# End of function search_old_patient_from_log.              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::03.5 ##
#########################
# Parses old patient data;
# Stores data in 7 sessions.

    function parse_old_patient_data(Request $request, $p_id){

        $old_patient_info=DB::table('patients')
        ->where('P_ID', $p_id)
        ->orderBy('AI_ID','desc')
        ->first();

        session(['P_ID' => $old_patient_info->P_ID]);
        session(['PATIENT_NAME' => $old_patient_info->Patient_Name]);
        session(['PATIENT_GENDER' => $old_patient_info->Patient_Gender]);
        session(['PATIENT_AGE' => $old_patient_info->Patient_Age]);
        session(['PATIENT_CELL' => $old_patient_info->Cell_Number]);
        session(['PATIENT_NID' => $old_patient_info->NID]);
        session(['PATIENT_NID_TYPE' => $old_patient_info->NID_Type]);
        session(['PATIENT_TYPE' => 'old']);
        session(['PATIENT_FOUND_BY' => 'id']);

        # Returning to [VIEW-NO::01].
        return redirect('/reception/home/setup/none');

    }

# End of function parse_old_patient_data.                   <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Shows all doctors in database;
# Distinctively shows the list of departments;
# Removes data from 3 sessions.

    function show_all_doctor(Request $request){

        $request->session()->forget('FROM');
        $request->session()->forget('TO');
        $request->session()->forget('PATIENT_APPOINT_TIME');
        $request->session()->forget('SESSION_FLASH_MSG');

        $available_doctor_data['result']=DB::table('doctors')->orderBy('Dr_Name','asc')->get();

        $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();
        
        # Returning to the view below.
        return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_department);

    }

# End of function show_all_doctor.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
#########################
# Shows specific doctor based on department;
# Distinctively shows the list of departments.

    function show_doctor_by_department($department){

        $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();

        $available_doctor_data['result']=DB::table('doctors')->where('Department',$department)->orderBy('Dr_Name','asc')->get();

        # Returning to the view below.
        return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_department);

    }

# End of function show_doctor_by_department.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::06 ####
#########################
# Shows specific doctor based on name and id;
# Distinctively shows the list of departments.

    function search_doctor(Request $request){

        $request->validate([

            'doctor_search_info'=>'required'

        ]);

        $doctor_search_info = $request->input('doctor_search_info');

        $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();

        $available_doctor_data['result']=DB::table('doctors')->where('Dr_Name','like','%'.$doctor_search_info.'%')->orWhere('D_ID','like',$doctor_search_info)->orderBy('Dr_Name','asc')->get();

        # Returning to the view below.
        return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_department);

    }

# End of function search_doctor.                            <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::07 ####
#########################
# Collects doctor info;
# Stores data in 6 sessions.

    function submit_doctor_selection(Request $request){

        $request->validate([

            'd_id'=>'required',
            'dr_name'=>'required',
            'fee'=>'required',
            'second_visit_discount'=>'required'

        ]);

        $D_ID = $request->input('d_id');
        $P_ID = $request->session()->get('P_ID');
        $patient_type = $request->session()->get('PATIENT_TYPE');
        session(['SECOND_VISIT_DISCOUNT' => $request->input('second_visit_discount')]);
        
        # Checking if patient gets second visit discount.
        if($patient_type == 'new'){

            session(['DISCOUNT' => 0]);

        }else{

            $P_log_data=DB::table('patient_logs')
            ->where('P_ID',$P_ID)
            ->where('D_ID',$D_ID)
            ->orderBy('AI_ID','desc')
            ->first();

            if($P_log_data){

                $current_ap_date = $request->session()->get('PATIENT_APPOINT_DATE');
                $old_ap_date = $P_log_data->Ap_Date;
                $discount_validity_limit = date('Y-m-d', strtotime($old_ap_date. ' + 30 days'));

                session(['DISCOUNT_VALIDITY' => $discount_validity_limit]);

                if($current_ap_date <= $discount_validity_limit){

                    session(['DISCOUNT' => $request->input('second_visit_discount')]);
        
                }else{
        
                    session(['DISCOUNT' => 0]);
        
                }              

            }else{

                session(['DISCOUNT' => 0]);

            }

        }

        session(['D_ID' => $D_ID]);
        session(['BASIC_FEE' => $request->input('fee')]);
        session(['D_NAME' => $request->input('dr_name')]);

        $redirect = $request->session()->get('REDIRECT');

        if($redirect == 'appointment'){

            # Redirecting to [FUNCTION-NO::08].
            return redirect('/reception/time_selection');

        }if($redirect == 'admit'){

            # Redirecting to [FUNCTION-NO::].
            return redirect('/reception/ward/male');

        }if($redirect == 'ot_scheduling'){

            # Redirecting to [FUNCTION-NO::3], [C::operation.php].
            return redirect('/ot/submit/new/schedule');

        }if($redirect == 'ot_new_entry'){

            session(['fee_input_type' => 'surgeon']);

            # Redirecting to view, hospital/ot/surgeon_fee.
            return redirect('/ot/set/fees');

        }if($redirect == 'invigilator_selection'){

            session(['fee_input_type' => 'surgeon']);

            # Redirecting to [FUNCTION-NO::4], [C::invigilation.php].
            return redirect('/nurse/invigilator/selected');

        }

    }

# End of function submit_doctor_selection.                  <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::08 ####
#########################
# Shows available time according to selected doctor.

    function show_available_time(Request $request){

        $id = $request->session()->get('D_ID');

        $available_doctor_time['routine']=DB::table('doctor_schedules')->where('D_ID',$id)->orderBy('F','asc')->get();

        # Session flash messages.
        $msg = $request->session()->get('SESSION_FLASH_MSG');

        if($msg){

            $request->session()->flash('msg',$msg);

        }

        # Returning to the view below.
        return view('hospital/reception/appoint_time',$available_doctor_time);

    }

# End of function show_available_time.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::09 ####
#########################
# Selects time from list;
# Stores data in 4 sessions.

    function set_time(Request $request,$d_s_ai_id){

        $id = $d_s_ai_id;

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $from = $time->F;
        $to = $time->T;
        $ap_time = $from. '-' .$to;

        session(['D_S_AI_ID' => $id]);
        session(['FROM' => $from]);
        session(['TO' => $to]);
        session(['PATIENT_APPOINT_TIME' => $ap_time]);

        # Redirecting to [FUNCTION-NO::08].
        return redirect('/reception/time_selection');

    }

# End of function set_time.                                 <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::10 ####
#########################
# Changes appointment date & day;
# Rechecks if Discount is still valid on changed date;
# Stores data in 3 sessions;
# Removes data from 6 sessions.

    function change_date(Request $request){

        $request->session()->forget('PATIENT_APPOINT_DATE');
        $request->session()->forget('PATIENT_APPOINT_DAY');
        $request->session()->forget('FROM');
        $request->session()->forget('TO');
        $request->session()->forget('PATIENT_APPOINT_TIME');
        $request->session()->forget('DISCOUNT');

        $request->validate([

            'appoint_date'=>'required'

        ]);

        $ap_date = $request->input('appoint_date');
        $timestamp = strtotime($ap_date);
        $day = date('D', $timestamp);

            #check if discount still valid
            $patient_type = $request->session()->get('PATIENT_TYPE');
            $discount_validity_limit = $request->session()->get('DISCOUNT_VALIDITY');
            $second_visit_discount = $request->session()->get('SECOND_VISIT_DISCOUNT');
            
            if($patient_type == 'old'){

                if($ap_date <= $discount_validity_limit){

                    session(['DISCOUNT' => $second_visit_discount]);
        
                }else{
        
                    session(['DISCOUNT' => 0]);
        
                }  

            }else{

                session(['DISCOUNT' => 0]);

            }

        session(['PATIENT_APPOINT_DATE' => $ap_date]);
        session(['PATIENT_APPOINT_DAY' => $day]);

        # Redirecting to [FUNCTION-NO::08].
        return redirect('/reception/time_selection');

    }

# End of function change_date.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::11 ####
#########################
# Cancels appointment;
# Removes data from 21 sessions.

    function cancel_appointment(Request $request){

        /* Deleting sessions */

        $request->session()->forget('PATIENT_P_ID');
        $request->session()->forget('PATIENT_NAME');
        $request->session()->forget('PATIENT_GENDER');
        $request->session()->forget('PATIENT_CELL');
        $request->session()->forget('PATIENT_NID');
        $request->session()->forget('PATIENT_NID_TYPE');
        $request->session()->forget('PATIENT_APPOINT_DATE');
        $request->session()->forget('PATIENT_APPOINT_DAY');
        $request->session()->forget('PATIENT_APPOINT_TIME');
        $request->session()->forget('PATIENT_APPOINT_TYPE');
        $request->session()->forget('PATIENT_TYPE');
        $request->session()->forget('D_ID');
        $request->session()->forget('D_NAME');
        $request->session()->forget('BASIC_FEE');
        $request->session()->forget('DISCOUNT');
        $request->session()->forget('DISCOUNT_VALIDITY');
        $request->session()->forget('SECOND_VISIT_DISCOUNT');
        $request->session()->forget('FROM');
        $request->session()->forget('TO');
        $request->session()->forget('DATE_TODAY');
        $request->session()->forget('D_S_AI_ID');

        # Session flash messages.
        $msg = $request->session()->get('SESSION_FLASH_MSG');

        if($msg){

            if($msg == 'Please assign an appointment time.'){

                $request->session()->forget('SESSION_FLASH_MSG');
                $request->session()->flash('msg','Appointment Canceled.');
    
            }else{

                $request->session()->flash('msg',$msg);

            }

        }else{

            $request->session()->flash('msg','Appointment Canceled.');

        }
        
        # Redirecting to [FUNCTION-NO::01].
        return redirect('/reception/home/');

    }

# End of function cancel_appointment.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::12 ####
#########################
# Generates patient unique ID;
# Generates token;
# Completes patient data entry for doctor appointments;
# Entry will happen on  --: TABLE :------ patients;
# Entry will happen on  --: TABLE :------ patient_logs;
# Update will happen on --: TABLE :------ doctor_schedules.

    function patient_data_entry_for_doctor_appointment(Request $request){

        date_default_timezone_set('Asia/Dhaka');

        $patient_type = $request->session()->get('PATIENT_TYPE');

        ########## FOR NEW PATIENTS ##########
        if($patient_type == 'new'){

            /* Patient id generator */

            $first_part = $request->session()->get('PATIENT_GENDER');
            
            if($first_part == 'Male'){
                $first_part = 'M';
            }elseif($first_part == 'Female'){
                $first_part = 'F';
                echo $first_part;
            }elseif($first_part == 'Child'){
                $first_part = 'C';
                echo $first_part;
            }elseif($first_part == 'Others'){
                $first_part = 'O';
                echo $first_part;
            }

            $second_part = date("dmY");

            $current_count = DB::table('patients')->orderBy('AI_ID','desc')->first();

            if($current_count==null){
                $third_part = 1;
            }else{
                $current_count_array = explode('-',$current_count->P_ID);
                $third_part = end($current_count_array);
                if($third_part == 999){
                    #$third_part = 1;
                    $third_part++;
                }if($current_count->Ad_Date != $second_part){
                    $third_part = 1;
                }else{
                    $third_part++;
                }
            }

            $P_ID = "$first_part"."-"."$second_part"."-".str_pad($third_part,3,"0",STR_PAD_LEFT);

            /* Patient id generator end */

        }
        
        ########## FOR OLD PATIENTS ##########
        else{

            $P_ID = $request->session()->get('P_ID');

        }
        
        session(['PATIENT_P_ID' => $P_ID]);

        $p_id = $request->session()->get('PATIENT_P_ID');
        
        # Validation of form data.
        $request->validate([

            'discount'=>'required',
            'payment_status'=>'required'

        ]);

        $ap_time = $request->session()->get('PATIENT_APPOINT_TIME');
        $ap_date = $request->session()->get('PATIENT_APPOINT_DATE');

        $todays_date = date("dmY");

        $patient_type = $request->session()->get('PATIENT_TYPE');

        if(!$ap_time){

            $d_s_ai_id = $request->session()->get('D_S_AI_ID');

            # Session flash message.
            $msg = 'Please assign an appointment time.';
            session(['SESSION_FLASH_MSG' => $msg]);

            # Redirecting to [FUNCTION-NO::08].
            return redirect('/reception/time_selection');

        }else{

            $request->session()->forget('SESSION_FLASH_MSG');

            if($patient_type=='new'){

                # Access able to only new patients.
                # Data entry to Table:----patients.
                
                $patients=array(

                    'P_ID'=>$p_id,
                    'Patient_Name'=>$request->session()->get('PATIENT_NAME'),
                    'Patient_Gender'=>$request->session()->get('PATIENT_GENDER'),
                    'Patient_Age'=>$request->session()->get('PATIENT_AGE'),
                    'Cell_Number'=>$request->session()->get('PATIENT_CELL'),
                    'NID'=>$request->session()->get('PATIENT_NID'),
                    'NID_Type'=>$request->session()->get('PATIENT_NID_TYPE'),
                    'Ad_Date'=>$todays_date
                    
                );

                DB::table('patients')->insert($patients);

            }if($patient_type=='new' || $patient_type=='old'){

                # Access able to new & old patients.
                # Data entry to Table:----patient_logs.

                $fee = $request->session()->get('BASIC_FEE');
                $discount = $request->input('discount');
                $final_fee = $request->input('paidAmount');
                $received = $request->input('received');
                $changes = $request->input('change');

                # Generate token.

                $token_generator=DB::table('patient_logs')->where('Ap_Date',$ap_date)->orderBy('AI_ID','desc')->first();

                if(!$token_generator){
                    $token=1;
                }else{
                    $sequence = $token_generator->Token;
                    $token=$sequence+1;
                }

                $random = rand(100000,999999);

                $patient_logs=array(

                    'P_ID'=>$p_id,
                    'Ap_Date'=>$ap_date,
                    'Ap_Time'=>$request->session()->get('PATIENT_APPOINT_TIME'),
                    'D_ID'=>$request->session()->get('D_ID'),
                    'Basic_Fee'=>$fee,
                    'Discount'=>$discount,
                    'Received'=>$received,
                    'Changes'=>$changes,
                    'Final_Fee'=>$final_fee,
                    'Payment_Status'=>$request->input('payment_status'),
                    'Treatment_Status'=>0,
                    'Token'=>$token,
                    'Random_code'=>$random,
                    'R_ID'=>$request->session()->get('REC_SESSION_ID')
                    
                );

                DB::table('patient_logs')->insert($patient_logs);

                # Data updated on Table:----doctor_schedules.

                $d_s_ai_id = $request->session()->get('D_S_AI_ID');
                $day = $request->session()->get('PATIENT_APPOINT_DAY');

                $data=array(

                    $day=>$token #logical error exist here.

                );

                DB::table('doctor_schedules')->where('AI_ID',$d_s_ai_id)->update($data);

            }

            # Session flash message.
            $msg = 'Patient Entry Successful.';
            session(['SESSION_FLASH_MSG' => $msg]);

            # Redirecting to [FUNCTION-NO::01], invoice controller.
            return redirect('/reception/invoice_list/appointment/');
        }

    }

# End of function patient_data_entry_for_doctor_appointment.<-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::13 ####
#########################
# Calculates individual money collection.
# Reads data from joined table.

    function show_list(Request $request, $date){

        $r_id = $request->session()->get('REC_SESSION_ID');

        /*$out_door['result']=DB::table('patient_logs')
        ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
        ->join('doctors', 'patient_logs.D_ID', '=', 'doctors.D_ID')
        ->select('patient_logs.*', 'patients.*', 'doctors.*')
        ->where('patient_logs.Time_Stamp','like',$date.'%')
        ->where('patient_logs.R_ID',$r_id)
        ->orderBy('patient_logs.AI_ID','desc')
        ->get();

        $out_door_collection=DB::table('patient_logs')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->sum('Final_Fee');

        $admission['result']=DB::table('admission_logs')
        ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
        ->join('doctors', 'admission_logs.D_ID', '=', 'doctors.D_ID')
        ->select('admission_logs.*', 'patients.*', 'doctors.*')
        ->where('admission_logs.Admission_Timestamp','like',$date.'%')
        ->where('admission_logs.R_ID',$r_id)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

        $admission_collection=DB::table('admission_logs')
        ->where('Admission_Timestamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->sum('Admission_Fee');

        $pathology['result']=DB::table('pathology_log')
        ->join('patients', 'pathology_log.P_ID', '=', 'patients.P_ID')
        ->select('pathology_log.*', 'patients.*')
        ->where('pathology_log.Time_Stamp','like',$date.'%')
        ->where('pathology_log.R_ID',$r_id)
        ->orderBy('pathology_log.AI_ID','desc')
        ->get();

        $pathology_collection=DB::table('pathology_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->sum('Paid');

        $physio['result']=DB::table('physio_log')
        ->join('patients', 'physio_log.P_ID', '=', 'patients.P_ID')
        ->select('physio_log.*', 'patients.*')
        ->where('physio_log.Time_Stamp','like',$date.'%')
        ->where('physio_log.R_ID',$r_id)
        ->orderBy('physio_log.AI_ID','desc')
        ->get();

        $physio_collection=DB::table('physio_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->sum('Fee');

        $er['result']=DB::table('emergency_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->orderBy('AI_ID','desc')
        ->get();

        $er_collection=DB::table('emergency_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->sum('Bill');*/

        $data['result']=DB::table('hospital_income_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('User_ID',$r_id)
        ->orderBy('Credit_Type','asc')
        ->get();

        $outdoor['doctor']=DB::table('patient_logs')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->where('Treatment_Status',0)
        ->orderBy('AI_ID','desc')
        ->get();

        $collection=DB::table('hospital_income_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('User_ID',$r_id)
        ->sum('Credit');

        $deduction=DB::table('hospital_income_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('User_ID',$r_id)
        ->sum('Debit');

        $outdoor_collection=DB::table('patient_logs')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$r_id)
        ->where('Treatment_Status',0)
        ->sum('Final_Fee');

        $collection = $collection - $deduction;
        $collection = $collection + $outdoor_collection;

        session(['collection' => $collection]);
        
        # Returning to the view below.
        return view('hospital/reception/patient_list',$data,$outdoor);

    }

# End of function show_list.                                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::13.5 ####
#########################
# Retrieves data from form;
# Stores data in 15 sessions.

function filter_summary(Request $request){

    $request->validate([

        'summary_date'=>'required'

    ]);
    
    $date = $request->input('summary_date');

    # Redirecting to [FUNCTION-NO::13].
    return redirect('/reception/patient_list/'.$date);

}

# End of function submit_basic_patient_info.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::14 ####
#########################
# Retrieves data from form;
# Stores data in 15 sessions.

function submit_admit_patient_info(Request $request){

    $request->validate([

        'pre_village'=>'required',
        'pre_postOffice'=>'required',
        'pre_upazilla'=>'required',
        'pre_district'=>'required',
        'per_village'=>'required',
        'per_postOffice'=>'required',
        'per_upazilla'=>'required',
        'per_district'=>'required',
        'religion'=>'required',
        'relative_address'=>'required',
        'emergency_cell'=>'required',
        'packages'=>'required',
        'ligation'=>'required',
        'thirdSeizure'=>'required'

    ]);
    
    session(['PRE_VILL' => $request->input('pre_village')]);
    session(['PRE_PO' => $request->input('pre_postOffice')]);
    session(['PRE_UPA' => $request->input('pre_upazilla')]);
    session(['PRE_DIST' => $request->input('pre_district')]);
    session(['PER_VILL' => $request->input('per_village')]);
    session(['PER_PO' => $request->input('per_postOffice')]);
    session(['PER_UPA' => $request->input('per_upazilla')]);
    session(['PER_DIST' => $request->input('per_district')]);
    session(['PATIENT_RELIGION' => $request->input('religion')]);
    session(['RELATIVE_ADDRESS' => $request->input('relative_address')]);
    session(['EMERGENCY_CELL' => $request->input('emergency_cell')]);
    session(['PACKAGES' => $request->input('packages')]);
    session(['LIGATION' => $request->input('ligation')]);
    session(['THIRD_SEIZURE' => $request->input('thirdSeizure')]);

    session(['bed_selection_type' => 'insert']);

    # Redirecting to [FUNCTION-NO::04].
    return redirect('/reception/doctor_selection/');

}

# End of function submit_basic_patient_info.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::15 ####
#########################
# Showing ward male all beds;
# Stores data in 1 sessions.

function show_wards_male(){

    $all_male_wards['bed']=DB::table('beds')->where('Quality','Male')->where('Bed_Type','Ward')->orderBy('Bed_Type','asc')->get();

    session(['BED_TYPE' => 'male_ward']);

    # Returning to the view below.
    return view('hospital/reception/beds',$all_male_wards);

}

# End of function show_wards_male.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::16 ####
#########################
# Showing ward female all beds;
# Stores data in 1 sessions.

function show_wards_female(){

    $all_female_wards['bed']=DB::table('beds')->where('Quality','Female')->where('Bed_Type','Ward')->orderBy('Bed_Type','asc')->get();

    session(['BED_TYPE' => 'female_ward']);

    # Returning to the view below.
    return view('hospital/reception/beds',$all_female_wards);

}

# End of function show_wards_female.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::17 ####
#########################
# Showing ward child all beds;
# Stores data in 1 sessions.

function show_wards_child(){

    $all_child_wards['bed']=DB::table('beds')->where('Quality','Child')->where('Bed_Type','Ward')->orderBy('Bed_Type','asc')->get();

    session(['BED_TYPE' => 'child_ward']);

    # Returning to the view below.
    return view('hospital/reception/beds',$all_child_wards);

}

# End of function show_wards_child.                         <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::18 ####
#########################
# Showing cabin all beds;
# Stores data in 1 sessions.

function show_cabin(){

    $all_cabin['bed']=DB::table('beds')->where('Bed_Type','Cabin')->orderBy('Bed_Type','asc')->get();

    session(['BED_TYPE' => 'cabin']);

    # Returning to the view below.
    return view('hospital/reception/beds',$all_cabin);

}

# End of function show_cabin.                               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::19 ####
#########################
# Updates confirmation; 
# Stores data in 7 sessions;
# Removes data from 7 sessions;
# Update will happen on --: TABLE :------ beds.

function confirm_bed(Request $request,$b_id){

    $bed_info=DB::table('beds')->where('B_ID',$b_id)->first();

    session(['B_ID' => $b_id]);
    session(['BED_NO' => $bed_info->Bed_No]);
    session(['BED_TYPE' => $bed_info->Bed_Type]);
    session(['QUALITY' => $bed_info->Quality]);
    session(['ROOM_NO' => $bed_info->Room_No]);
    session(['FLOOR_NO' => $bed_info->Floor_No]);
    session(['ADMISSION_FEE' => $bed_info->Admission_Fee]);

    $check=$bed_info->Confirmation;
    if($check==0){

        $book=array(

            'Confirmation'=>1

        );
        
        # booking bed.
        DB::table('beds')
        ->where('B_ID', $b_id)
        ->update($book);

        # Redirecting to [FUNCTION-NO::].
        return redirect('/reception/admission/payment');

    }else{

        $request->session()->forget('B_ID');
        $request->session()->forget('BED_NO');
        $request->session()->forget('BED_TYPE');
        $request->session()->forget('QUALITY');
        $request->session()->forget('ROOM_NO');
        $request->session()->forget('FLOOR_NO');
        $request->session()->forget('ADMISSION_FEE');

        # Session flash message.
        $msg = 'This bed is already taken. Please pick another one.';

        $request->session()->flash('msg', $msg);

        # Redirecting to [FUNCTION-NO::15].
        return redirect('/reception/ward/male');

    }

}

# End of function confirm_bed.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::19.5 ##
#########################
# Selects null for bed.

function local_patient(Request $request){

    session(['B_ID' => " "]);
    session(['BED_NO' => " "]);
    session(['BED_TYPE' => " "]);
    session(['QUALITY' => " "]);
    session(['ROOM_NO' => " "]);
    session(['FLOOR_NO' => " "]);
    session(['ADMISSION_FEE' => 0]);

    # Returning to the view below.
    return redirect('/reception/admission/payment');

}

# End of function local_patient.                            <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::20 ####
#########################
# Updates confirmation; 
# takes back to bed selection;
# Removes data from 7 sessions;
# Update will happen on --: TABLE :------ beds.

function reselect_bed(Request $request){

    # deleting previous bed related sessions.
    $request->session()->forget('BED_NO');
    $request->session()->forget('BED_TYPE');
    $request->session()->forget('QUALITY');
    $request->session()->forget('ROOM_NO');
    $request->session()->forget('FLOOR_NO');
    $request->session()->forget('ADMISSION_FEE');

    # updating previous selected bed to available.
    $b_id = $request->session()->get('B_ID');

    $cancel=array(

        'Confirmation'=>0
        
    );

    # cancelling bed.
    DB::table('beds')
    ->where('B_ID', $b_id)
    ->update($cancel);

    $request->session()->forget('B_ID');

    $cancelFlag = $request->session()->get('Cancel_Flag');
    if($cancelFlag == 'green'){

        session(['Cancel_Flag' => 'red']);

        # Redirecting to [FUNCTION-NO::21].
        return redirect('/reception/cancel/admission');

    }else{

        # Redirecting to [FUNCTION-NO::15].
        return redirect('/reception/ward/male');

    }

}

# End of function reselect_bed.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::21 ####
#########################
# Cancels admission before bed selection;
# Removes data from 35 sessions.

function cancel_admission_before_bed_selection(Request $request){

    /* Deleting sessions */

    $request->session()->forget('PATIENT_P_ID');
    $request->session()->forget('PATIENT_NAME');
    $request->session()->forget('PATIENT_GENDER');
    $request->session()->forget('PATIENT_CELL');
    $request->session()->forget('PATIENT_NID');
    $request->session()->forget('PATIENT_NID_TYPE');
    $request->session()->forget('PATIENT_APPOINT_DATE');
    $request->session()->forget('PATIENT_APPOINT_DAY');
    $request->session()->forget('PATIENT_APPOINT_TIME');
    $request->session()->forget('PATIENT_APPOINT_TYPE');
    $request->session()->forget('PATIENT_TYPE');
    $request->session()->forget('D_ID');
    $request->session()->forget('D_NAME');
    $request->session()->forget('BASIC_FEE');
    $request->session()->forget('DISCOUNT');
    $request->session()->forget('DISCOUNT_VALIDITY');
    $request->session()->forget('SECOND_VISIT_DISCOUNT');
    $request->session()->forget('FROM');
    $request->session()->forget('TO');
    $request->session()->forget('DATE_TODAY');
    $request->session()->forget('D_S_AI_ID');

    $request->session()->forget('PRE_VILL');
    $request->session()->forget('PRE_PO');
    $request->session()->forget('PRE_UPA');
    $request->session()->forget('PRE_DIST');
    $request->session()->forget('PER_VILL');
    $request->session()->forget('PER_PO');
    $request->session()->forget('PER_UPA');
    $request->session()->forget('PER_DIST');
    $request->session()->forget('PATIENT_RELIGION');
    $request->session()->forget('RELATIVE_ADDRESS');
    $request->session()->forget('EMERGENCY_CELL');
    $request->session()->forget('PACKAGES');
    $request->session()->forget('LIGATION');
    $request->session()->forget('THIRD_SEIZURE');

    # Session flash messages.
    $admission_cancel_msg = "Admission Canceled.";

    $request->session()->flash('msg', $admission_cancel_msg);

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/reception/home/');

}

# End of function cancel_admission_before_bed_selection.    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::22 ####
#########################
# Cancels admission after bed selection;

function cancel_admission_after_bed_selection(Request $request){

    session(['Cancel_Flag' => 'green']);

    # Redirecting to [FUNCTION-NO::20].
    return redirect('/reception/bed/reselect');

}

# End of function cancel_admission_after_bed_selection.     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::23 ####
#########################
# Generates patient unique ID;
# Completes patient data entry for admission;
# Entry will happen on  --: TABLE :------ patients.
# Entry will happen on  --: TABLE :------ admission_logs.
# Entry will happen on  --: TABLE :------ hospital_income_log.

function patient_data_entry_for_admission(Request $request){

    date_default_timezone_set('Asia/Dhaka');

    if($request->session()->get('bed_selection_type')=='insert'){

        $a_id = $request->session()->get('old_a_id');

        $patient_type = $request->session()->get('PATIENT_TYPE');

        ########## FOR NEW PATIENTS ##########
        if($patient_type == 'new'){

            /* Patient id generator */

            $first_part = $request->session()->get('PATIENT_GENDER');
            
            if($first_part == 'Male'){
                $first_part = 'M';
            }elseif($first_part == 'Female'){
                $first_part = 'F';
                echo $first_part;
            }elseif($first_part == 'Child'){
                $first_part = 'C';
                echo $first_part;
            }elseif($first_part == 'Others'){
                $first_part = 'O';
                echo $first_part;
            }

            $second_part = date("dmY");

            $current_count = DB::table('patients')->orderBy('AI_ID','desc')->first();

            if($current_count==null){
                $third_part = 1;
            }else{
                $current_count_array = explode('-',$current_count->P_ID);
                $third_part = end($current_count_array);
                if($third_part == 999){
                    #$third_part = 1;
                    $third_part++;
                }if($current_count->Ad_Date != $second_part){
                    $third_part = 1;
                }else{
                    $third_part++;
                }
            }

            $P_ID = "$first_part"."-"."$second_part"."-".str_pad($third_part,3,"0",STR_PAD_LEFT);

            /* Patient id generator end */

        }
        
        ########## FOR OLD PATIENTS ##########
        else{

            $P_ID = $request->session()->get('P_ID');

        }
        
        session(['PATIENT_P_ID' => $P_ID]);

        $p_id = $request->session()->get('PATIENT_P_ID');
        
        # Validation of form data.
        $request->validate([

            'received'=>'required',
            'change' =>'required'

        ]);

        $todays_date = date("Ymd");

        $patient_type = $request->session()->get('PATIENT_TYPE');

            $request->session()->forget('SESSION_FLASH_MSG');

            if($patient_type=='new'){

                # Access able to only new patients.
                # Data entry to Table:----patients.
                
                $patients=array(

                    'P_ID'=>$p_id,
                    'Patient_Name'=>$request->session()->get('PATIENT_NAME'),
                    'Patient_Gender'=>$request->session()->get('PATIENT_GENDER'),
                    'Patient_Age'=>$request->session()->get('PATIENT_AGE'),
                    'Cell_Number'=>$request->session()->get('PATIENT_CELL'),
                    'NID'=>$request->session()->get('PATIENT_NID'),
                    'NID_Type'=>$request->session()->get('PATIENT_NID_TYPE'),
                    'Ad_Date'=>date("dmY")
                    
                );

                DB::table('patients')->insert($patients);

            }if($patient_type=='new' || $patient_type=='old'){

                # Access able to new & old patients.
                # Data entry to Table:----admission_logs.

                $admission_fee = $request->input('estimated_bill');
                $received = $request->input('received');
                $changes = $request->input('change');
                $ad_fee = $received - $changes;

                $admission_logs=array(

                    'P_ID'=>$p_id,
                    'R_ID'=>$request->session()->get('REC_SESSION_ID'),
                    'B_ID'=>$request->session()->get('B_ID'),
                    'D_ID'=>$request->session()->get('D_ID'),
                    'Pre_Vill'=>$request->session()->get('PRE_VILL'),
                    'Pre_PO'=>$request->session()->get('PRE_PO'),
                    'Pre_Upa'=>$request->session()->get('PRE_UPA'),
                    'Pre_Dist'=>$request->session()->get('PRE_DIST'),
                    'Per_Vill'=>$request->session()->get('PER_VILL'),
                    'Per_PO'=>$request->session()->get('PER_PO'),
                    'Per_Upa'=>$request->session()->get('PER_UPA'),
                    'Per_Dist'=>$request->session()->get('PER_DIST'),
                    'Admission_Date'=>$request->session()->get('PATIENT_APPOINT_DATE'),
                    'Religion'=>$request->session()->get('PATIENT_RELIGION'),
                    'Consultant'=>$request->session()->get('D_NAME'),
                    'Emergency_Rel_Add'=>$request->session()->get('RELATIVE_ADDRESS'),
                    'Emergency_Number'=>$request->session()->get('EMERGENCY_CELL'),
                    'Package_Confirmation'=>$request->session()->get('PACKAGES'),
                    'Ligation'=>$request->session()->get('LIGATION'),
                    'Third_Seizure'=>$request->session()->get('THIRD_SEIZURE'),
                    'Admission_Fee'=>$ad_fee,
                    'Paid_Amount'=>$received,
                    'Changes'=>$changes
                    
                );

                DB::table('admission_logs')->insert($admission_logs);

                # Data insert on Table:----hospital_income_log.

                $vat = $request->session()->get('VAT');
                $credit = $ad_fee;
                $gov_vat = ($vat/100)*$credit;
                $income = $credit-$gov_vat;

                $message='Admission fee for patient: '.$p_id;

                $hospital_income_logs=array(

                    'Message'=>$message,
                    'Debit'=>0,
                    'Credit'=>$credit,
                    'Vat'=>$gov_vat,
                    'Service_Charge'=>$income,
                    'Total_Income'=>$income,
                    'Credit_Type'=>'Admission Fee',
                    'Entry_Date'=>$todays_date,
                    'Entry_Time'=>date("H:i:s"),
                    'Entry_Year'=>date("Y"),
                    'User_ID'=>$request->session()->get('REC_SESSION_ID')

                );

                DB::table('hospital_income_log')->insert($hospital_income_logs);

            }

            # Session flash message.
            $msg = 'Patient Admission Successful.';
            session(['SESSION_FLASH_MSG' => $msg]);

            # Redirecting to [FUNCTION-NO::02], invoice controller.
            return redirect('/reception/invoice_list/admission/');


    # True when switching bed.
    }if($request->session()->get('bed_selection_type')=='update'){

        # Data insert on Table:----hospital_income_log.
        $vat = $request->session()->get('VAT');
        $credit = $request->session()->get('previous_credit');
        $gov_vat = (($vat/100)*$credit);
        $income = 0;
        $p_id = $request->session()->get('old_p_id');

        $todays_date = date("Ymd");

        $message='Bed change for patient: '.$p_id;

        $hospital_income_logs=array(

            'Message'=>$message,
            'Debit'=>$credit,
            'Credit'=>0,
            'Vat'=>$gov_vat*(-1),
            'Service_Charge'=>$income,
            'Total_Income'=>$income,
            'Credit_Type'=>'Bed change',
            'Entry_Date'=>$todays_date,
            'Entry_Time'=>date("H:i:s"),
            'Entry_Year'=>date("Y"),
            'User_ID'=>$request->session()->get('REC_SESSION_ID')

        );

        DB::table('hospital_income_log')->insert($hospital_income_logs);

        # Admission_logs.
        $p_id = $request->session()->get('old_p_id');
        $a_id = $request->session()->get('old_a_id');
        $bed_type = $request->session()->get('old_bed_type');

        # Finding number of days.
        $admission_date = $request->session()->get('old_ad_date');
        $update_date = date("Y-m-d");

        $datetime1 = new DateTime($update_date);
        $datetime2 = new DateTime($admission_date);
        $difference = $datetime1->diff($datetime2); 
        $days = $difference->d;

        # Data update to Table:----admission_logs.
        $admission_fee = $request->input('estimated_bill');
        $received = $request->input('received');
        $changes = $request->input('change');
        $ad_fee = $received - $changes;
        $ad_fee_for_admission_log = $ad_fee + $credit;

        if($bed_type=='Cabin'){
            $Ward_Days = null;
            $Cabin_Days = $days;
        }if($bed_type=='Ward'){
            $Ward_Days = $days;
            $Cabin_Days = null;
        }

        $admission_logs=array(

            'R_ID'=>$request->session()->get('REC_SESSION_ID'),
            'B_ID'=>$request->session()->get('B_ID'),
            'Admission_Fee'=>$ad_fee_for_admission_log,
            'Paid_Amount'=>$received,
            'Changes'=>$changes,
            'Update_date'=>$update_date,
            'Update_Timestamp'=>date('Y-m-d H:i:s'),
            'Ward_Days'=>$Ward_Days,
            'Cabin_Days'=>$Cabin_Days

        );

            DB::table('admission_logs')
            ->where('A_ID', $a_id)
            ->update($admission_logs);

            # Data insert on Table:----hospital_income_log.

            $vat = $request->session()->get('VAT');
            $credit = $ad_fee_for_admission_log;
            $gov_vat = ($vat/100)*$credit;
            $income = $credit-$gov_vat;

            $message='New Admission fee for patient: '.$p_id.'. Old admission fee debited.' ;

            $hospital_income_logs=array(

                'Message'=>$message,
                'Debit'=>0,
                'Credit'=>$credit,
                'Vat'=>$gov_vat,
                'Service_Charge'=>$income,
                'Total_Income'=>$income,
                'Credit_Type'=>'Admission Fee',
                'Entry_Date'=>$todays_date,
                'Entry_Time'=>date("H:i:s"),
                'Entry_Year'=>date("Y"),
                'User_ID'=>$request->session()->get('REC_SESSION_ID')

            );

            DB::table('hospital_income_log')->insert($hospital_income_logs);

            # Session flash message.
            $msg = 'Bed Change Successful.';
            session(['SESSION_FLASH_MSG' => $msg]);

            # Redirecting to [FUNCTION-NO::02], invoice controller.
            return redirect('/reception/invoice_list/admission/');

    }

}

# End of function patient_data_entry_for_doctor_appointment.<-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::24 ####
#########################
# Cancels appointment after submission;
# Delete will happen on  --: TABLE :------ patient_logs.
# Update will happen on --: TABLE :------ doctor_schedules.

function appointment_cancellation_after(Request $request, $ai_id){

    date_default_timezone_set('Asia/Dhaka');

    # getting log data.
    $log_data=DB::table('patient_logs')
        ->where('AI_ID', $ai_id)
        ->first();

    $final_fee = $log_data->Final_Fee;
    $ap_date = $log_data->Ap_Date;
    $ap_time = $log_data->Ap_Time;
    $D_ID = $log_data->D_ID;
    $treatment_status = $log_data->Treatment_Status;
    $timestamp = strtotime($ap_date);
    $day = date('D', $timestamp);

    # getting from
    $token_array = explode('-',$ap_time);
    $from = current($token_array);

    # getting schedule data.
    $schedule=DB::table('doctor_schedules')
        ->where('D_ID', $D_ID)
        ->where('F', $from)
        ->first();

    $count = $schedule->$day;
    $count = $count-1;
    $d_s_ai_id = $schedule->AI_ID;

    $data=array(
        $day=>$count
    );

    if($treatment_status==0){

        DB::table('patient_logs')
            ->where('AI_ID', $ai_id)
            ->delete();

        DB::table('doctor_schedules')
            ->where('AI_ID',$d_s_ai_id)
            ->update($data);

    }

    # Redirecting to [FUNCTION-NO::01], invoice controller.
    return redirect('/reception/invoice_list/appointment/');

}

# End of function appointment_cancellation_after.           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::25 ####
#########################
# Switching beds;
# Update will happen on --: TABLE :------ beds.

function switch_bed(Request $request, $a_id){

    date_default_timezone_set('Asia/Dhaka');

    # getting log data.
    $log_data=DB::table('admission_logs')
        ->where('A_ID', $a_id)
        ->where('OT_Confirmation', null)
        ->where('Payment_Confirmation', null)
        ->first();

    $update_date = $log_data->Update_Date;

    if(empty($update_date)){

        $b_id = $log_data->B_ID;
        session(['previous_credit' =>  $log_data->Admission_Fee]);
        session(['previously_received' =>  $log_data->Paid_Amount]);
        session(['previously_changed' =>  $log_data->Changes]);


        session(['PRE_VILL' => $log_data->Pre_Vill]);
        session(['PRE_PO' => $log_data->Pre_PO]);
        session(['PRE_UPA' => $log_data->Pre_Upa]);
        session(['PRE_DIST' => $log_data->Pre_Dist]);
        session(['PER_VILL' => $log_data->Per_Vill]);
        session(['PER_PO' => $log_data->Per_PO]);
        session(['PER_UPA' => $log_data->Per_Upa]);
        session(['PER_DIST' => $log_data->Per_Dist]);
        session(['PATIENT_RELIGION' => $log_data->Religion]);
        session(['RELATIVE_ADDRESS' => $log_data->Emergency_Rel_Add]);
        session(['EMERGENCY_CELL' => $log_data->Emergency_Number]);
        session(['PACKAGES' => $log_data->Package_Confirmation]);
        session(['LIGATION' => $log_data->Ligation]);
        session(['THIRD_SEIZURE' => $log_data->Third_Seizure]);

        $cancel=array(

            'Confirmation'=>0

        );

        # canceling old bed.
        $bed_data=DB::table('beds')
            ->where('B_ID', $b_id)
            ->update($cancel);

        session(['bed_selection_type' => 'update']);
        session(['old_a_id' => $a_id]);
        session(['old_b_id' => $b_id]);
        session(['old_ad_date' => $log_data->Admission_Date]);
        session(['old_p_id' => $log_data->P_ID]);


        # getting bed info.
        $bed_data=DB::table('beds')
            ->where('B_ID', $b_id)
            ->first();

        session(['old_bed_type' => $bed_data->Bed_Type]);

        # Redirecting to [FUNCTION-NO::15].
        return redirect('/reception/ward/male');

    }else{

        # Redirecting to [FUNCTION-NO::02], invoice controller.
        return redirect('/reception/invoice_list/admission/');

    }

}

# End of function switch_bed.                               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::26 ####
#########################
# Cancels switching beds;
# Update will happen on --: TABLE :------ beds.

function cancel_bed_switch(Request $request){

    $b_id= $request->session()->get('old_b_id');

    $cancel=array(

        'Confirmation'=>1

    );

    # canceling old bed.
    $bed_data=DB::table('beds')
        ->where('B_ID', $b_id)
        ->update($cancel);

    # Redirecting to [FUNCTION-NO::02], invoice controller.
    return redirect('/reception/invoice_list/admission/');

}

# End of function cancel_bed_switch.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::27 ####
#########################
# Cancels switching beds;
# Update will happen on --: TABLE :------ beds.

function go_to_emergency(Request $request){

    # doctor list.
    $doctor['info']=DB::table('doctors')
        ->where('Department','DMO')
        ->orderBy('D_ID','desc')
        ->get();

    # Getting account variables.
    $acc_var=DB::table('account_variables')
        ->orderBy('AI_ID','desc')
        ->first();

    session(['emergency_fee' => $acc_var->Emergency_Fee]);

    # Returning to the view below.
    return view('hospital/reception/emergency',$doctor);

}

# End of function cancel_bed_switch.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::28 ####
#########################
# Stores ER Data;
# Entry will happen on  --: TABLE :------ emergency_log.
# Update will happen on --: TABLE :------ doctors.
# Entry will happen on  --: TABLE :------ doctor_balance_logs.
# Entry will happen on  --: TABLE :------ hospital_income_log.

function emergency_entry(Request $request){

    # Getting account variables.
    $acc_var=DB::table('account_variables')
        ->orderBy('AI_ID','desc')
        ->first();

    $er_hospital_percentage = $acc_var->ER_Hospital_Percentage;
    
    # Getting and inserting er log data.
    $request->validate([

        'dmo'=>'required',
        'bill'=>'required',
        'received'=>'required',
        'change'=>'required'

    ]);

    $d_id = $request->input('dmo');
    $bill = $request->input('bill');
    $received = $request->input('received');
    $changes = $request->input('change');
    $income = $received-$changes;

    $er_data=array(

        'Name'=>$request->input('er_patient_name'),
        'Ref_Name'=>$request->input('ref_name'),
        'Ref_Cell_Number'=>$request->input('ref_cell'),
        'D_ID'=>$d_id,
        'R_ID'=>$request->session()->get('REC_SESSION_ID'),
        'Bill'=>$bill,
        'Received'=>$received,
        'Changes'=>$changes,
        'Reg_Date'=>$request->session()->get('DATE_TODAY')

    );

    DB::table('emergency_log')->insert($er_data);


        # checking current balance.
        $wallet=DB::table('doctor_balance_logs')
            ->where('D_ID',$d_id)
            ->orderBy('AI_ID','desc')
            ->first();

        $income = ($er_hospital_percentage/100)*$income;

        if($wallet){
            $current_balance = $wallet->Current_Balance;
            $current_balance = $current_balance + $income;
        }else{
            $current_balance = 0;
            $current_balance = $current_balance + $income;
        }

        $log=array(

            'D_ID'=>$d_id,
            'B_Date'=>$request->session()->get('DATE_TODAY'),
            'Credit'=>$income,
            'Commission'=>0,
            'Income'=>$income,
            'Current_Balance'=>$current_balance,
            'O_ID'=>0,
            'Acc_ID'=>$request->session()->get('REC_SESSION_ID')

        );

        # Insert balance log.
        DB::table('doctor_balance_logs')
            ->insert($log);

        $wallet_value=array(

            'Wallet'=>$current_balance

        );

        # Updating doctor wallet.
        $doctor_wallet=DB::table('doctors')
            ->where('D_ID',$d_id)
            ->update($wallet_value);

        # Insert in hospital log log.

        $message = "Emergency Fee for: ".$request->input('er_patient_name');
        $credit = $received - $changes;
        $service_charge = $credit - $income;
        $gov_vat = 0;
        $credit_type = "Emergency";

        $hospital_income_logs=array(

            'Message'=>$message,
            'Debit'=>0,
            'Credit'=>$credit,
            'Vat'=>$gov_vat,
            'Service_Charge'=>$service_charge,
            'Total_Income'=>$service_charge,
            'Credit_Type'=>$credit_type,
            'Entry_Date'=>date("Ymd"),
            'Entry_Time'=>date("H:i:s"),
            'Entry_Year'=>date("Y"),
            'User_ID'=>$request->session()->get('REC_SESSION_ID')

        );

        DB::table('hospital_income_log')->insert($hospital_income_logs);

        # Redirecting to [FUNCTION-NO::06], invoice controller.
        return redirect('/reception/invoice_list/er/');

}

# End of function emergency_entry.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# Redirect will point to ER invoice in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::29 ####
#########################
# Generates patient unique ID;
# Patient data entry for dental;
# Entry will happen on  --: TABLE :------ patients.
# Entry will happen on  --: TABLE :------ dental_logs.

function dental_patient_info_entry(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $patient_type = $request->session()->get('PATIENT_TYPE');

    ########## FOR NEW PATIENTS ##########
    if($patient_type == 'new'){

        /* Patient id generator */

        $first_part = $request->session()->get('PATIENT_GENDER');
            
        if($first_part == 'Male'){
            $first_part = 'M';
        }elseif($first_part == 'Female'){
            $first_part = 'F';
            echo $first_part;
        }elseif($first_part == 'Child'){
            $first_part = 'C';
            echo $first_part;
        }elseif($first_part == 'Others'){
            $first_part = 'O';
            echo $first_part;
        }

        $second_part = date("dmY");

        $current_count = DB::table('patients')->orderBy('AI_ID','desc')->first();

        if($current_count==null){
            $third_part = 1;
        }else{
            $current_count_array = explode('-',$current_count->P_ID);
            $third_part = end($current_count_array);
            if($third_part == 999){
                #$third_part = 1;
                $third_part++;
            }if($current_count->Ad_Date != $second_part){
                $third_part = 1;
            }else{
                $third_part++;
            }
        }

        $P_ID = "$first_part"."-"."$second_part"."-".str_pad($third_part,3,"0",STR_PAD_LEFT);

        /* Patient id generator end */

    }
        
    ########## FOR OLD PATIENTS ##########
    else{

        $P_ID = $request->session()->get('P_ID');

    }
        
    session(['PATIENT_P_ID' => $P_ID]);

    $p_id = $request->session()->get('PATIENT_P_ID');
    $todays_date = date("Ymd");
    $patient_type = $request->session()->get('PATIENT_TYPE');
    $request->session()->forget('SESSION_FLASH_MSG');

    if($patient_type=='new'){

        # Access able to only new patients.
        # Data entry to Table:----patients.
                
        $patients=array(

            'P_ID'=>$p_id,
            'Patient_Name'=>$request->session()->get('PATIENT_NAME'),
            'Patient_Gender'=>$request->session()->get('PATIENT_GENDER'),
            'Patient_Age'=>$request->session()->get('PATIENT_AGE'),
            'Cell_Number'=>$request->session()->get('PATIENT_CELL'),
            'NID'=>$request->session()->get('PATIENT_NID'),
            'NID_Type'=>$request->session()->get('PATIENT_NID_TYPE'),
            'Ad_Date'=>date("dmY")
                    
        );

        DB::table('patients')->insert($patients);

    }if($patient_type=='new' || $patient_type=='old'){

        # Access able to new & old patients.

        # Generate dental test no.
        $current_count = DB::table('dental_log')->orderBy('AI_ID','desc')->first();

        if(!$current_count){
            $test_no = 1;
        }else{
            $test_no = $current_count->AI_ID;
            $test_no++;
        }

        session(['dental_test_no' => $test_no]);

        # Data entry to Table:----dental_logs.

        $dental_logs=array(

            'P_ID'=>$p_id,
            'R_ID'=>$request->session()->get('REC_SESSION_ID'),
            'Dental_Test_No'=>$test_no,
            'Reg_Date'=>$request->session()->get('reg_date')

        );

        DB::table('dental_log')->insert($dental_logs);

    }

    # Session flash message.
    $msg = 'Patient registered, choose tests to proceed.';
    session(['SESSION_FLASH_MSG' => $msg]);

    # Redirecting to [FUNCTION-NO::30].
    return redirect('/reception/show_tests/dental/');

}

# End of function dental_patient_info_entry.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::30 ####
#########################
# Shows all dental tests;

function show_dental_tests(Request $request){

    $dental_test_no = $request->session()->get('dental_test_no');
    
    # test list.
    $test['info']=DB::table('dental_info')
        ->where('State','1')
        ->orderBy('Test_Name','asc')
        ->get();

    $selected_test['logs']=DB::table('dental_info')
        ->join('dental_test_log', 'dental_info.AI_ID', '=', 'dental_test_log.Dental_Info_AI_ID')
        ->select('dental_info.*', 'dental_test_log.Dental_Info_AI_ID', 'dental_test_log.Fee', 'dental_test_log.Dental_Test_No')
        ->where('dental_info.State','1')
        ->where('dental_test_log.Dental_Test_No',$dental_test_no)
        ->orderBy('dental_info.Test_Name','asc')
        ->get();

    session(['dental_test_search' => 3]);

    # Returning to the view below.
    return view('hospital/reception/dental_tests',$test,$selected_test);

}

# End of function show_dental_tests.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::31 ####
#########################
# Shows specific test based on name;

function search_dental_tests(Request $request){

    $dental_test_no = $request->session()->get('dental_test_no');
    
    # Searching test
    $request->validate([

        'test_search_info'=>'required'

    ]);

    $test_search_info = $request->input('test_search_info');

    $available_test_data['info']=DB::table('dental_info')
        ->where('Test_Name','like','%'.$test_search_info.'%')
        ->orderBy('Test_Name','asc')
        ->get();

    $a_t_d=DB::table('dental_info')
        ->where('Test_Name','like','%'.$test_search_info.'%')
        ->count();

    $selected_test['logs']=DB::table('dental_info')
        ->join('dental_test_log', 'dental_info.AI_ID', '=', 'dental_test_log.Dental_Info_AI_ID')
        ->select('dental_info.*', 'dental_test_log.Dental_Info_AI_ID', 'dental_test_log.Fee', 'dental_test_log.Dental_Test_No')
        ->where('dental_info.State','1')
        ->where('dental_test_log.Dental_Test_No',$dental_test_no)
        ->orderBy('dental_info.Test_Name','asc')
        ->get();

    if($a_t_d==null){
        session(['dental_test_search' => 0]);
    }else{
        session(['dental_test_search' => 1]);
    }

    # Returning to the view below.
    return view('hospital/reception/dental_tests',$available_test_data,$selected_test);

}

# End of function search_dental_tests.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::32 ####
#########################
# Selects test;
# Entry will happen on  --: TABLE :------ dental_test_log.

function select_dental_tests(Request $request){

    # Data entry to Table:----dental_test_log.

    $D_I_AI_ID=$request->input('test_id');
    $D_T_N=$request->input('test_no');
    session(['D_I_AI_ID' => $D_I_AI_ID]);
    
    $check=DB::table('dental_test_log')
        ->where('Dental_Info_AI_ID',$D_I_AI_ID)
        ->where('Dental_Test_No',$D_T_N)
        ->count();

    if($check==null){

        $dental_test_logs=array(
            'Dental_Info_AI_ID'=>$D_I_AI_ID,
            'Dental_Test_No'=>$D_T_N,
            'Fee'=>$request->input('test_fee')
        );
    
        DB::table('dental_test_log')
            ->insert($dental_test_logs);

        # Session flash message.
        $msg = 'Test selected.';

    }

    # Session flash message.
    $msg = 'Already selected.';

    session(['SESSION_FLASH_MSG' => $msg]);

    # Redirecting to [FUNCTION-NO::30].
    return redirect('/reception/show_tests/dental/');

}

# End of function select_dental_tests.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::33 ####
#########################
# Unselects test;
# Delete will happen on  --: TABLE :------ dental_test_log.

function unselect_dental_tests(Request $request, $di_ai_id){

    # Data delete from Table:----dental_test_log.

    $dtn=$request->session()->get('dental_test_no');

    session(['di_ai_id' => $di_ai_id]);

    DB::table('dental_test_log')
        ->where('Dental_Info_AI_ID', $di_ai_id)
        ->where('Dental_Test_No', $dtn)
        ->delete();

    # Session flash message.
    $msg = 'Test deleted.';
    session(['SESSION_FLASH_MSG' => $msg]);

    # Redirecting to [FUNCTION-NO::30].
    return redirect('/reception/show_tests/dental/');

}

# End of function unselect_dental_tests.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::34 ####
#########################
# Cancels all prior unfinished dental test input;
# Delete will happen on  --: TABLE :------ dental_log.
# Delete will happen on  --: TABLE :------ dental_test_log.

function cancel_all_dental_test(Request $request){

    $dtn=$request->session()->get('dental_test_no');

    $target=DB::table('dental_log')
        ->where('Dental_Test_No', $dtn)
        ->orderby('AI_ID','desc')
        ->first();
    
    # Data delete from Table:----dental_log.
    DB::table('dental_log')
        ->where('AI_ID', $target->AI_ID)
        ->delete();
    
    # Data delete from Table:----dental_test_log.
    DB::table('dental_test_log')
        ->where('Dental_Test_No', $dtn)
        ->delete();
    
    # Session flash message.
    $msg = 'Dental tests canceled.';
    session(['SESSION_FLASH_MSG' => $msg]);

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/reception/home/');

}

# End of function unselect_dental_tests.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::35 ####
#########################
# Shows selected tests;
# Suggests dentists.

function dental_payment_page(Request $request){

    $dental_test_no = $request->session()->get('dental_test_no');
    $D_I_AI_ID = $request->session()->get('D_I_AI_ID');

    # doctor list.
    $doctor['info']=DB::table('doctors')
        ->where('Department','Dental')
        ->orderBy('D_ID','desc')
        ->get();

    # selected tests.
    $selected_test['logs']=DB::table('dental_info')
        ->join('dental_test_log', 'dental_info.AI_ID', '=', 'dental_test_log.Dental_Info_AI_ID')
        ->select('dental_info.*', 'dental_test_log.Dental_Info_AI_ID', 'dental_test_log.Fee', 'dental_test_log.Dental_Test_No')
        ->where('dental_info.State','1')
        ->where('dental_test_log.Dental_Test_No',$dental_test_no)
        ->orderBy('dental_info.Test_Name','asc')
        ->get();

    # count total bill.
    $total_bill = DB::table('dental_test_log')
        ->where('Dental_Test_No', $dental_test_no)
        ->sum('Fee');

    session(['Dentist_Test_Total_Fee' => $total_bill]);

    # Returning to the view below.
    return view('hospital/reception/dental_payment',$doctor,$selected_test);

}

# End of function dental_payment_page.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::36 ####
#########################
# Submit dental payment;
# Update will happen on --: TABLE :------ dental_log;
# Update will happen on --: TABLE :------ doctors;
# Entry will happen on  --: TABLE :------ doctor_balance_logs;
# Entry will happen on  --: TABLE :------ hospital_income_log.

function dental_payment_submission(Request $request){

    # Collect require data.
    $dental_test_no = $request->session()->get('dental_test_no');
    # $D_I_AI_ID = $request->session()->get('D_I_AI_ID');
    $vat = $request->session()->get('VAT');
    $estimated_bill = $request->session()->get('Dentist_Test_Total_Fee');
    $calculated_bill = $request->input('calculated_bill');
    $service_charge_percentage = $request->session()->get('DENTAL_HOSPITAL_PERCENTAGE');
    $p_id = $request->session()->get('PATIENT_P_ID');
    $d_id = $request->input('dentist');

    $discount = $request->input('discount');
    $received = $request->input('received');
    $change = $request->input('change');
    if($change < 0){
        $abs_change = $change*(-1);
        $paid = $received;
    }else{
        $abs_change = $change;
        $paid = $received - $change;
    }
    $due_amount = $calculated_bill-$received;

    if($due_amount>0){
        $real_due = $due_amount;
    }else{
        $real_due = 0;
    }
    
    $dental_log=array(

        'D_ID'=>$d_id,
        'Discount'=>$discount,
        'Paid'=>$paid,
        'Received'=>$received,
        'Changes'=>$change,
        'Payment_Status'=>$request->input('payment_status'),
        'Due_Amount'=>$real_due,
        'Total_Amount'=>$estimated_bill,
        'Payable_Amount'=>$calculated_bill

    );

    DB::table('dental_log')
        ->where('Dental_Test_No',$dental_test_no)    
        ->update($dental_log);

    if($due_amount>0){

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*$received);

        # Calculate dentist income.
        $dentist_income = $received-$service_charge;

    }else{

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*($received-$abs_change));

        # Calculate dentist income.
        $dentist_income = ($received-$abs_change)-$service_charge;

    }

    # Calculate gov vat & income.
    $gov_vat = (($vat/100)*$service_charge);
    $income = $service_charge-$gov_vat;

    # Date.
    $todays_date = date("Ymd");

    # Generating message.
    $message='Dental services for: '.$p_id.', given by: '.$d_id;

    if($change<0){
        $actual_credit = $received;
    }else{
        $actual_credit = $received-$change;
    }

    # Log entry on hospital balance log.
    $hospital_income_logs=array(

        'Message'=>$message,
        'Debit'=>0,
        'Credit'=>$actual_credit,
        'Vat'=>$gov_vat,
        'Service_Charge'=>$service_charge,
        'Total_Income'=>$income,
        'Credit_Type'=>'Dental',
        'Entry_Date'=>$todays_date,
        'Entry_Time'=>date("H:i:s"),
        'Entry_Year'=>date("Y"),
        'User_ID'=>$request->session()->get('REC_SESSION_ID')

    );

    DB::table('hospital_income_log')
    ->insert($hospital_income_logs);


    # checking current balance.
    $wallet=DB::table('doctor_balance_logs')
    ->where('D_ID',$d_id)
    ->orderBy('AI_ID','desc')
    ->first();

    if($wallet){
        $current_balance = $wallet->Current_Balance;
        $current_balance = $current_balance + $dentist_income;
    }else{
        $current_balance = 0;
        $current_balance = $current_balance + $dentist_income;
    }

    $log=array(

        'D_ID'=>$d_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Credit'=>$dentist_income,
        'Commission'=>0,
        'Income'=>$dentist_income,
        'Current_Balance'=>$current_balance,
        'Acc_ID'=>$request->session()->get('REC_SESSION_ID'),
        'O_ID'=>0

    );

    # Insert balance log.
    DB::table('doctor_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating doctor wallet.
    $doctor_wallet=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::02], invoice controller.
    return redirect('/reception/invoice_list/dental/');

}

# End of function dental_payment_submission.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::37 ####
#########################
# Shows patient info, tests taken, due info.

function due_payment(Request $request, $dtn){

    $dental_test_no = $dtn;
    session(['dtn' => $dtn]);

    # selected tests.
    $selected_test['logs']=DB::table('dental_info')
        ->join('dental_test_log', 'dental_info.AI_ID', '=', 'dental_test_log.Dental_Info_AI_ID')
        ->select('dental_info.*', 'dental_test_log.Dental_Info_AI_ID', 'dental_test_log.Fee', 'dental_test_log.Dental_Test_No')
        ->where('dental_info.State','1')
        ->where('dental_test_log.Dental_Test_No',$dental_test_no)
        ->orderBy('dental_info.Test_Name','asc')
        ->get();

    # log infos.
    $log=DB::table('dental_log')
        ->where('Dental_Test_No',$dental_test_no)
        ->first();

    $p_id=$log->P_ID;
    session(['due_p_id' => $p_id]);

    $d_id=$log->D_ID;
    session(['due_d_id' => $d_id]);

    session(['total_amount' => $log->Due_Amount]);
    session(['paid' => $log->Paid]);
    session(['discount' => $log->Discount]);
    session(['bill' => $log->Payable_Amount]);
    session(['previously_received' => $log->Received]);
    session(['previously_change' => $log->Changes]);

    # patient infos.
    $patient=DB::table('patients')
        ->where('P_ID',$p_id)
        ->first();

    session(['due_p_name' => $patient->Patient_Name]);
    session(['due_p_age' => $patient->Patient_Age]);
    session(['due_p_gender' => $patient->Patient_Gender]);

    # doctor infos.
    $doctor=DB::table('doctors')
        ->where('D_ID',$d_id)
        ->first();

    session(['due_d_name' => $doctor->Dr_Name]);

    # count total bill.
    $total_bill = DB::table('dental_test_log')
        ->where('Dental_Test_No', $dental_test_no)
        ->sum('Fee');

    session(['DUE_TYPE' => 'dental']);

    # Returning to the view below.
    return view('hospital/reception/due_payment',$selected_test);

}

# End of function due_payment.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::38 ####
#########################
# Submit dental due payment;
# Update will happen on --: TABLE :------ dental_log;
# Update will happen on --: TABLE :------ doctors;
# Entry will happen on  --: TABLE :------ doctor_balance_logs;
# Entry will happen on  --: TABLE :------ hospital_income_log.

function dental_due_payment_submission(Request $request){

    # Collect require data.
    $dental_test_no = $request->session()->get('dtn');
    # $D_I_AI_ID = $request->session()->get('D_I_AI_ID');
    $vat = $request->session()->get('VAT');

    $calculated_bill = $request->input('calculated_bill');
    $service_charge_percentage = $request->session()->get('DENTAL_HOSPITAL_PERCENTAGE');
    $p_id = $request->session()->get('due_p_id');
    $d_id = $request->session()->get('due_d_id');

    $received = $request->input('received');
    $change = $request->input('change');
    if($change < 0){
        $abs_change = $change*(-1);
    }else{
        $abs_change = $change;
    }
    $due_amount = $calculated_bill-$received;
    $paid = $request->input('paid');

    if($due_amount>0){

        $paid = $paid + $received;
        $real_due = $due_amount;

    }else{

        $paid = $paid + ($received-$abs_change);
        $real_due = 0;

    }

    /*$previously_received = $request->input('previously_received');
    $total_received = $previously_received + $received;

    $previously_change = $request->input('previously_change');
    $total_change = $previously_change + $change;*/
    
    $dental_log=array(

        'Paid'=>$paid,
        'Received'=>$received,
        'Changes'=>$change,
        'Due_Amount'=>$real_due

    );

    DB::table('dental_log')
        ->where('Dental_Test_No',$dental_test_no)    
        ->update($dental_log);

    if($due_amount>0){

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*$received);

        # Calculate dentist income.
        $dentist_income = $received-$service_charge;

    }else{

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*($received-$abs_change));

        # Calculate dentist income.
        $dentist_income = ($received-$abs_change)-$service_charge;

    }

    # Calculate gov vat & income.
    $gov_vat = (($vat/100)*$service_charge);
    $income = $service_charge-$gov_vat;

    # Date.
    $todays_date = date("Ymd");

    # Generating message.
    $message='Dental services for: '.$p_id.', given by: '.$d_id.', Due payment.';

    if($change<0){
        $actual_credit = $received;
    }else{
        $actual_credit = $received-$change;
    }

    # Log entry on hospital balance log.
    $hospital_income_logs=array(

        'Message'=>$message,
        'Debit'=>0,
        'Credit'=>$actual_credit,
        'Vat'=>$gov_vat,
        'Service_Charge'=>$service_charge,
        'Total_Income'=>$income,
        'Credit_Type'=>'Dental',
        'Entry_Date'=>$todays_date,
        'Entry_Time'=>date("H:i:s"),
        'Entry_Year'=>date("Y"),
        'User_ID'=>$request->session()->get('REC_SESSION_ID')

    );

    DB::table('hospital_income_log')
    ->insert($hospital_income_logs);


    # checking current balance.
    $wallet=DB::table('doctor_balance_logs')
    ->where('D_ID',$d_id)
    ->orderBy('AI_ID','desc')
    ->first();

    if($wallet){
        $current_balance = $wallet->Current_Balance;
        $current_balance = $current_balance + $dentist_income;
    }else{
        $current_balance = 0;
        $current_balance = $current_balance + $dentist_income;
    }

    $log=array(

        'D_ID'=>$d_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Credit'=>$dentist_income,
        'Commission'=>0,
        'Income'=>$dentist_income,
        'Current_Balance'=>$current_balance,
        'Acc_ID'=>$request->session()->get('REC_SESSION_ID'),
        'O_ID'=>0

    );

    # Insert balance log.
    DB::table('doctor_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating doctor wallet.
    $doctor_wallet=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::03], invoice controller.
    return redirect('/reception/invoice_list/dental/');

}

# End of function dental_payment_submission.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::39 ####
#########################
# Generates patient unique ID;
# Patient data entry for pathology;
# Entry will happen on  --: TABLE :------ patients.
# Entry will happen on  --: TABLE :------ pathology_log.

function pathology_patient_info_entry(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $patient_type = $request->session()->get('PATIENT_TYPE');

    ########## FOR NEW PATIENTS ##########
    if($patient_type == 'new'){

        /* Patient id generator */

        $first_part = $request->session()->get('PATIENT_GENDER');
            
        if($first_part == 'Male'){
            $first_part = 'M';
        }elseif($first_part == 'Female'){
            $first_part = 'F';
            echo $first_part;
        }elseif($first_part == 'Child'){
            $first_part = 'C';
            echo $first_part;
        }elseif($first_part == 'Others'){
            $first_part = 'O';
            echo $first_part;
        }

        $second_part = date("dmY");

        $current_count = DB::table('patients')->orderBy('AI_ID','desc')->first();

        if($current_count==null){
            $third_part = 1;
        }else{
            $current_count_array = explode('-',$current_count->P_ID);
            $third_part = end($current_count_array);
            if($third_part == 999){
                #$third_part = 1;
                $third_part++;
            }if($current_count->Ad_Date != $second_part){
                $third_part = 1;
            }else{
                $third_part++;
            }
        }

        $P_ID = "$first_part"."-"."$second_part"."-".str_pad($third_part,3,"0",STR_PAD_LEFT);

        /* Patient id generator end */

    }
        
    ########## FOR OLD PATIENTS ##########
    else{

        $P_ID = $request->session()->get('P_ID');

    }
        
    session(['PATIENT_P_ID' => $P_ID]);

    $p_id = $request->session()->get('PATIENT_P_ID');
    $todays_date = date("Ymd");
    $patient_type = $request->session()->get('PATIENT_TYPE');
    $request->session()->forget('SESSION_FLASH_MSG');

    if($patient_type=='new'){

        # Access able to only new patients.
        # Data entry to Table:----patients.
                
        $patients=array(

            'P_ID'=>$p_id,
            'Patient_Name'=>$request->session()->get('PATIENT_NAME'),
            'Patient_Gender'=>$request->session()->get('PATIENT_GENDER'),
            'Patient_Age'=>$request->session()->get('PATIENT_AGE'),
            'Cell_Number'=>$request->session()->get('PATIENT_CELL'),
            'NID'=>$request->session()->get('PATIENT_NID'),
            'NID_Type'=>$request->session()->get('PATIENT_NID_TYPE'),
            'Ad_Date'=>date("dmY")
                    
        );

        DB::table('patients')->insert($patients);

    }if($patient_type=='new' || $patient_type=='old'){

        # Access able to new & old patients.

        # Generate test no.
        $current_count = DB::table('pathology_log')->orderBy('AI_ID','desc')->first();

        if(!$current_count){
            $test_no = 1;
        }else{
            $test_no = $current_count->AI_ID;
            $test_no++;
        }

        session(['test_no' => $test_no]);

        # Data entry to Table:----dental_logs.

        $pathology_log=array(

            'P_ID'=>$p_id,
            'R_ID'=>$request->session()->get('REC_SESSION_ID'),
            'Test_No'=>$test_no,
            'Reg_Date'=>$request->session()->get('reg_date')

        );

        DB::table('pathology_log')->insert($pathology_log);

    }

    # Session flash message.
    $msg = 'Patient registered, choose tests to proceed.';
    session(['SESSION_FLASH_MSG' => $msg]);

    session(['test_group' => 'All']);
    $test_group = $request->session()->get('test_group');

    # Redirecting to [FUNCTION-NO::40].
    return redirect('/reception/show_tests/pathology/'.$test_group);

}

# End of function pathology_patient_info_entry.             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::40 ####
#########################
# Shows all pathology tests;

function show_pathology_tests(Request $request, $test_group){

    $test_no = $request->session()->get('test_no');

    if($test_group=="All"){

        # test list.
        $test['info']=DB::table('pathology_info')
        ->where('State','1')
        ->orderBy('Test_Name','asc')
        ->get();

    }else{

        # test list.
        $test['info']=DB::table('pathology_info')
        ->where('State','1')
        ->where('Groups',$test_group)
        ->orderBy('Test_Name','asc')
        ->get();

    }

    $selected_test['logs']=DB::table('pathology_info')
        ->join('pathology_test_log', 'pathology_info.AI_ID', '=', 'pathology_test_log.Test_Info_AI_ID')
        ->select('pathology_info.*', 'pathology_test_log.Test_Info_AI_ID', 'pathology_test_log.Fee', 'pathology_test_log.Test_No')
        ->where('pathology_info.State','1')
        ->where('pathology_test_log.Test_No',$test_no)
        ->orderBy('pathology_info.Test_Name','asc')
        ->get();

    session(['test_search' => 3]);
    session(['test_group' => $test_group]);

    # Returning to the view below.
    return view('hospital/reception/pathology',$test,$selected_test);

}

# End of function show_pathology_tests.                     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::41 ####
#########################
# Shows specific test based on name;

function search_pathology_tests(Request $request){

    $test_no = $request->session()->get('test_no');
    $test_group = $request->session()->get('test_group');
    
    # Searching test
    $request->validate([

        'test_search_info'=>'required'

    ]);

    $test_search_info = $request->input('test_search_info');

    if($test_group=="All"){

        $available_test_data['info']=DB::table('pathology_info')
        ->where('Test_Name','like','%'.$test_search_info.'%')
        ->orderBy('Test_Name','asc')
        ->get();
    
    }else{
    
        $available_test_data['info']=DB::table('pathology_info')
        ->where('Test_Name','like','%'.$test_search_info.'%')
        ->where('Groups','like','%'.$test_group.'%')
        ->orderBy('Test_Name','asc')
        ->get();
    
    }

    $a_t_d=DB::table('pathology_info')
        ->where('Test_Name','like','%'.$test_search_info.'%')
        ->where('Groups','like','%'.$test_group.'%')
        ->count();

    $selected_test['logs']=DB::table('pathology_info')
        ->join('pathology_test_log', 'pathology_info.AI_ID', '=', 'pathology_test_log.Test_Info_AI_ID')
        ->select('pathology_info.*', 'pathology_test_log.Test_Info_AI_ID', 'pathology_test_log.Fee', 'pathology_test_log.Test_No')
        ->where('pathology_info.State','1')
        ->where('pathology_test_log.Test_No',$test_no)
        ->orderBy('pathology_info.Test_Name','asc')
        ->get();

    if($a_t_d==null){
        session(['dental_test_search' => 0]);
    }else{
        session(['dental_test_search' => 1]);
    }

    # Returning to the view below.
    return view('hospital/reception/pathology',$available_test_data,$selected_test);

}

# End of function search_dental_tests.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::42 ####
#########################
# Selects pathology test;
# Entry will happen on  --: TABLE :------ pathology_test_log.

function select_tests(Request $request){

    # Data entry to Table:----pathology_test_log.

    $T_I_AI_ID=$request->input('test_id');
    $T_N=$request->input('test_no');
    session(['T_I_AI_ID' => $T_I_AI_ID]);
    
    $check=DB::table('pathology_test_log')
        ->where('Test_Info_AI_ID',$T_I_AI_ID)
        ->where('Test_No',$T_N)
        ->count();

    if($check==null){

        $pathology_test_logs=array(
            'Test_Info_AI_ID'=>$T_I_AI_ID,
            'Test_No'=>$T_N,
            'Fee'=>$request->input('test_fee')
        );
    
        DB::table('pathology_test_log')
            ->insert($pathology_test_logs);

        # Session flash message.
        $msg = 'Test selected.';

    }else{

        # Session flash message.
        $msg = 'Already selected.';

    }

    session(['SESSION_FLASH_MSG' => $msg]);
    $test_group = $request->session()->get('test_group');

    # Redirecting to [FUNCTION-NO::40].
    return redirect('/reception/show_tests/pathology/'.$test_group);

}

# End of function select_tests.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::43 ####
#########################
# Unselects test;
# Delete will happen on  --: TABLE :------ pathology_test_log.

function unselect_tests(Request $request, $ti_ai_id){

    # Data delete from Table:----pathology_test_log.

    $tn=$request->session()->get('test_no');

    session(['ti_ai_id' => $ti_ai_id]);

    DB::table('pathology_test_log')
        ->where('Test_Info_AI_ID', $ti_ai_id)
        ->where('Test_No', $tn)
        ->delete();

    # Session flash message.
    $msg = 'Test deleted.';
    session(['SESSION_FLASH_MSG' => $msg]);
    $test_group = $request->session()->get('test_group');

    # Redirecting to [FUNCTION-NO::40].
    return redirect('/reception/show_tests/pathology/'.$test_group);

}

# End of function unselect_tests.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::44 ####
#########################
# Cancels all prior unfinished test input;
# Delete will happen on  --: TABLE :------ pathology_log.
# Delete will happen on  --: TABLE :------ pathology_test_log.

function cancel_all_tests(Request $request){

    $tn=$request->session()->get('test_no');

    $target=DB::table('pathology_log')
        ->where('Test_No', $tn)
        ->orderby('AI_ID','desc')
        ->first();
    
    # Data delete from Table:----dental_log.
    DB::table('pathology_log')
        ->where('AI_ID', $target->AI_ID)
        ->delete();
    
    # Data delete from Table:----dental_test_log.
    DB::table('pathology_test_log')
        ->where('Test_No', $tn)
        ->delete();
    
    # Session flash message.
    $msg = 'Tests canceled.';
    session(['SESSION_FLASH_MSG' => $msg]);

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/reception/home/');

}

# End of function cancel_all_tests.                         <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::45 ####
#########################
# Shows selected tests;
# Suggests doctors.

function pathology_payment_page(Request $request){

    $test_no = $request->session()->get('test_no');
    $T_I_AI_ID = $request->session()->get('T_I_AI_ID');

    # doctor list.
    $doctor['info']=DB::table('doctors')
        ->orderBy('D_ID','desc')
        ->get();

    # selected tests.
    $selected_test['logs']=DB::table('pathology_info')
        ->join('pathology_test_log', 'pathology_info.AI_ID', '=', 'pathology_test_log.Test_Info_AI_ID')
        ->select('pathology_info.*', 'pathology_test_log.Test_Info_AI_ID', 'pathology_test_log.Fee', 'pathology_test_log.Test_No')
        ->where('pathology_info.State','1')
        ->where('pathology_test_log.Test_No',$test_no)
        ->orderBy('pathology_info.Test_Name','asc')
        ->get();

    # count total bill.
    $total_bill = DB::table('pathology_test_log')
        ->where('Test_No', $test_no)
        ->sum('Fee');

    session(['Pathology_Test_Total_Fee' => $total_bill]);

    # Returning to the view below.
    return view('hospital/reception/pathology_payment',$doctor,$selected_test);

}

# End of function pathology_payment_page.                   <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::46 ####
#########################
# Submit pathology payment;
# Update will happen on --: TABLE :------ pathology_log;
# Update will happen on --: TABLE :------ doctors;
# Entry will happen on  --: TABLE :------ doctor_balance_logs;
# Entry will happen on  --: TABLE :------ hospital_income_log.

function pathology_payment_submission(Request $request){

    # Collect require data.
    $test_no = $request->session()->get('test_no');
    # $D_I_AI_ID = $request->session()->get('D_I_AI_ID');
    $vat = $request->session()->get('VAT');
    $estimated_bill = $request->session()->get('Pathology_Test_Total_Fee');
    $calculated_bill = $request->input('calculated_bill');
    $service_charge_percentage = $request->session()->get('PATHOLOGY_HOSPITAL_PERCENTAGE');
    $p_id = $request->session()->get('PATIENT_P_ID');
    $d_id = $request->input('doctor');

    $discount = $request->input('discount');
    $received = $request->input('received');
    $change = $request->input('change');
    if($change < 0){
        $abs_change = $change*(-1);
    }else{
        $abs_change = $change;
    }
    $due_amount = $calculated_bill-$received;

    if($due_amount>0){
        $real_due = $due_amount;
    }else{
        $real_due = 0;
    }
    
    $pathology_log=array(

        'D_ID'=>$d_id,
        'Discount'=>$discount,
        'Paid'=>$received,
        'Received'=>$received,
        'Changes'=>$change,
        'Payment_Status'=>$request->input('payment_status'),
        'Due_Amount'=>$real_due,
        'Total_Amount'=>$estimated_bill,
        'Payable_Amount'=>$calculated_bill,
        'Delivery_Date'=>$request->input('del_date')

    );

    DB::table('pathology_log')
        ->where('Test_No',$test_no)    
        ->update($pathology_log);

    if($due_amount>0){

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*$received);

        # Calculate doctor income.
        $doctor_income = $received-$service_charge;

    }else{

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*($received-$abs_change));

        # Calculate doctor income.
        $doctor_income = ($received-$abs_change)-$service_charge;

    }

    # Calculate gov vat & income.
    $gov_vat = (($vat/100)*$service_charge);
    $income = $service_charge-$gov_vat;

    # Date.
    $todays_date = date("Ymd");

    # Generating message.
    $message='Pathology services for: '.$p_id.', referred by: '.$d_id;

    if($change<0){
        $actual_credit = $received;
    }else{
        $actual_credit = $received-$change;
    }

    # Log entry on hospital balance log.
    $hospital_income_logs=array(

        'Message'=>$message,
        'Debit'=>0,
        'Credit'=>$actual_credit,
        'Vat'=>$gov_vat,
        'Service_Charge'=>$service_charge,
        'Total_Income'=>$income,
        'Credit_Type'=>'Pathology',
        'Entry_Date'=>$todays_date,
        'Entry_Time'=>date("H:i:s"),
        'Entry_Year'=>date("Y"),
        'User_ID'=>$request->session()->get('REC_SESSION_ID')

    );

    DB::table('hospital_income_log')
    ->insert($hospital_income_logs);

    if($d_id != 'self' && $doctor_income!=0){

        # checking current balance.
        $wallet=DB::table('doctor_balance_logs')
        ->where('D_ID',$d_id)
        ->orderBy('AI_ID','desc')
        ->first();

        if($wallet){
            $current_balance = $wallet->Current_Balance;
            $current_balance = $current_balance + $doctor_income;
        }else{
            $current_balance = 0;
            $current_balance = $current_balance + $doctor_income;
        }

        $log=array(

            'D_ID'=>$d_id,
            'B_Date'=>$request->session()->get('DATE_TODAY'),
            'Credit'=>$doctor_income,
            'Commission'=>0,
            'Income'=>$doctor_income,
            'Current_Balance'=>$current_balance,
            'Acc_ID'=>$request->session()->get('REC_SESSION_ID'),
            'O_ID'=>0

        );

        # Insert balance log.
        DB::table('doctor_balance_logs')
        ->insert($log);

        $wallet_value=array(

            'Wallet'=>$current_balance

        );

        # updating doctor wallet.
        $doctor_wallet=DB::table('doctors')
        ->where('D_ID',$d_id)
        ->update($wallet_value);

        # Redirecting to [FUNCTION-NO::04], invoice controller.
        return redirect('/reception/invoice_list/pathology/');

    }else{

        # Redirecting to [FUNCTION-NO::04], invoice controller.
        return redirect('/reception/invoice_list/pathology/');

    }

}

# End of function pathology_payment_submission.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::47 ####
#########################
# Shows patient info, tests taken, due info.

function due_payment_pathology(Request $request, $tn){

    $test_no = $tn;
    session(['tn' => $tn]);

    # selected tests.
    $selected_test['logs']=DB::table('pathology_info')
        ->join('pathology_test_log', 'pathology_info.AI_ID', '=', 'pathology_test_log.Test_Info_AI_ID')
        ->select('pathology_info.*', 'pathology_test_log.Test_Info_AI_ID', 'pathology_test_log.Fee', 'pathology_test_log.Test_No')
        ->where('pathology_info.State','1')
        ->where('pathology_test_log.Test_No',$test_no)
        ->orderBy('pathology_info.Test_Name','asc')
        ->get();

    # log infos.
    $log=DB::table('pathology_log')
        ->where('Test_No',$test_no)
        ->first();

    $p_id=$log->P_ID;
    session(['due_p_id' => $p_id]);

    $d_id=$log->D_ID;
    session(['due_d_id' => $d_id]);

    session(['total_amount' => $log->Due_Amount]);
    session(['paid' => $log->Paid]);
    session(['discount' => $log->Discount]);
    session(['bill' => $log->Payable_Amount]);
    session(['previously_received' => $log->Received]);
    session(['previously_change' => $log->Changes]);

    # patient infos.
    $patient=DB::table('patients')
        ->where('P_ID',$p_id)
        ->first();

    session(['due_p_name' => $patient->Patient_Name]);
    session(['due_p_age' => $patient->Patient_Age]);
    session(['due_p_gender' => $patient->Patient_Gender]);

    if($d_id != 'self'){

        # doctor infos.
        $doctor=DB::table('doctors')
            ->where('D_ID',$d_id)
            ->first();

        session(['due_d_name' => $doctor->Dr_Name]);

    }else{

        session(['due_d_name' => $d_id]);

    }

    # count total bill.
    $total_bill = DB::table('pathology_test_log')
        ->where('Test_No', $test_no)
        ->sum('Fee');

    session(['DUE_TYPE' => 'pathology']);

    # Returning to the view below.
    return view('hospital/reception/due_payment',$selected_test);

}

# End of function due_payment_pathology.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::48 ####
#########################
# Submit dental due payment;
# Update will happen on --: TABLE :------ dental_log;
# Update will happen on --: TABLE :------ doctors;
# Entry will happen on  --: TABLE :------ doctor_balance_logs;
# Entry will happen on  --: TABLE :------ hospital_income_log.

function pathology_due_payment_submission(Request $request){

    # Collect require data.
    $test_no = $request->session()->get('tn');
    # $D_I_AI_ID = $request->session()->get('D_I_AI_ID');
    $vat = $request->session()->get('VAT');

    $calculated_bill = $request->input('calculated_bill');
    $service_charge_percentage = $request->session()->get('PATHOLOGY_HOSPITAL_PERCENTAGE');
    $p_id = $request->session()->get('due_p_id');
    $d_id = $request->session()->get('due_d_id');

    $received = $request->input('received');
    $change = $request->input('change');
    if($change < 0){
        $abs_change = $change*(-1);
    }else{
        $abs_change = $change;
    }
    $due_amount = $calculated_bill-$received;
    $paid = $request->input('paid');

    if($due_amount>0){

        $paid = $paid + $received;
        $real_due = $due_amount;

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*$received);

        # Calculate refer income.
        $refer_income = $received-$service_charge;

    }else{

        $paid = $paid + ($received-$abs_change);
        $real_due = 0;

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*($received-$abs_change));

        # Calculate refer income.
        $refer_income = ($received-$abs_change)-$service_charge;

    }

    /*$previously_received = $request->input('previously_received');
    $total_received = $previously_received + $received;

    $previously_change = $request->input('previously_change');
    $total_change = $previously_change + $change;*/
    
    $pathology_log=array(

        'Paid'=>$paid,
        'Received'=>$received,
        'Changes'=>$change,
        'Due_Amount'=>$real_due

    );

    DB::table('pathology_log')
        ->where('Test_No',$test_no)    
        ->update($pathology_log);

    # Calculate gov vat & income.
    $gov_vat = (($vat/100)*$service_charge);
    $income = $service_charge-$gov_vat;

    # Date.
    $todays_date = date("Ymd");

    # Generating message.
    $message='Pathology services for: '.$p_id.', given by: '.$d_id.', Due payment.';

    if($change<0){
        $actual_credit = $received;
    }else{
        $actual_credit = $received-$change;
    }

    # Log entry on hospital balance log.
    $hospital_income_logs=array(

        'Message'=>$message,
        'Debit'=>0,
        'Credit'=>$actual_credit,
        'Vat'=>$gov_vat,
        'Service_Charge'=>$service_charge,
        'Total_Income'=>$income,
        'Credit_Type'=>'Dental',
        'Entry_Date'=>$todays_date,
        'Entry_Time'=>date("H:i:s"),
        'Entry_Year'=>date("Y"),
        'User_ID'=>$request->session()->get('REC_SESSION_ID')

    );

    DB::table('hospital_income_log')
    ->insert($hospital_income_logs);

    if($d_id != 'self' && $refer_income!=0){

        # checking current balance.
        $wallet=DB::table('doctor_balance_logs')
        ->where('D_ID',$d_id)
        ->orderBy('AI_ID','desc')
        ->first();

        if($wallet){
            $current_balance = $wallet->Current_Balance;
            $current_balance = $current_balance + $refer_income;
        }else{
            $current_balance = 0;
            $current_balance = $current_balance + $refer_income;
        }

        $log=array(

            'D_ID'=>$d_id,
            'B_Date'=>$request->session()->get('DATE_TODAY'),
            'Credit'=>$refer_income,
            'Commission'=>0,
            'Income'=>$refer_income,
            'Current_Balance'=>$current_balance,
            'Acc_ID'=>$request->session()->get('REC_SESSION_ID'),
            'O_ID'=>0

        );

        # Insert balance log.
        DB::table('doctor_balance_logs')
        ->insert($log);

        $wallet_value=array(

            'Wallet'=>$current_balance

        );

        # updating doctor wallet.
        $doctor_wallet=DB::table('doctors')
        ->where('D_ID',$d_id)
        ->update($wallet_value);

        # Redirecting to [FUNCTION-NO::04], invoice controller.
        return redirect('/reception/invoice_list/pathology/');

    }else{

        # Redirecting to [FUNCTION-NO::04], invoice controller.
        return redirect('/reception/invoice_list/pathology/');

    }

}

# End of function pathology_due_payment_submission.         <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::49 ####
#########################
# Collects billing info; 
# Suggests doctors.

function physio_patient_info_entry(Request $request){

    # doctor list.
    $doctor['info']=DB::table('doctors')
        ->where('Department','Physiology')
        ->orderBy('D_ID','desc')
        ->get();

    # Returning to the view below.
    return view('hospital/reception/physio',$doctor);

}

# End of function pathology_payment_page.                   <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::50 ####
#########################
# Generates patient unique ID;
# Patient data entry for physio;
# Entry will happen on  --: TABLE :------ patients;
# Entry will happen on  --: TABLE :------ physio_log;
# Entry will happen on  --: TABLE :------ hospital_income_log;
# Entry will happen on  --: TABLE :------ doctor_balance_log;
# Update will happen on --: TABLE :------ doctors.

function physio_log_create(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $patient_type = $request->session()->get('PATIENT_TYPE');

    ########## FOR NEW PATIENTS ##########
    if($patient_type == 'new'){

        /* Patient id generator */

        $first_part = $request->session()->get('PATIENT_GENDER');
            
        if($first_part == 'Male'){
            $first_part = 'M';
        }elseif($first_part == 'Female'){
            $first_part = 'F';
            echo $first_part;
        }elseif($first_part == 'Child'){
            $first_part = 'C';
            echo $first_part;
        }elseif($first_part == 'Others'){
            $first_part = 'O';
            echo $first_part;
        }

        $second_part = date("dmY");

        $current_count = DB::table('patients')->orderBy('AI_ID','desc')->first();

        if($current_count==null){
            $third_part = 1;
        }else{
            $current_count_array = explode('-',$current_count->P_ID);
            $third_part = end($current_count_array);
            if($third_part == 999){
                #$third_part = 1;
                $third_part++;
            }if($current_count->Ad_Date != $second_part){
                $third_part = 1;
            }else{
                $third_part++;
            }
        }

        $P_ID = "$first_part"."-"."$second_part"."-".str_pad($third_part,3,"0",STR_PAD_LEFT);

        /* Patient id generator end */

    }
        
    ########## FOR OLD PATIENTS ##########
    else{

        $P_ID = $request->session()->get('P_ID');

    }
        
    session(['PATIENT_P_ID' => $P_ID]);

    $p_id = $request->session()->get('PATIENT_P_ID');
    $todays_date = date("Ymd");
    $patient_type = $request->session()->get('PATIENT_TYPE');
    $request->session()->forget('SESSION_FLASH_MSG');

    if($patient_type=='new'){

        # Access able to only new patients.
        # Data entry to Table:----patients.
                
        $patients=array(

            'P_ID'=>$p_id,
            'Patient_Name'=>$request->session()->get('PATIENT_NAME'),
            'Patient_Gender'=>$request->session()->get('PATIENT_GENDER'),
            'Patient_Age'=>$request->session()->get('PATIENT_AGE'),
            'Cell_Number'=>$request->session()->get('PATIENT_CELL'),
            'NID'=>$request->session()->get('PATIENT_NID'),
            'NID_Type'=>$request->session()->get('PATIENT_NID_TYPE'),
            'Ad_Date'=>date("dmY")

        );

        DB::table('patients')->insert($patients);

    }if($patient_type=='new' || $patient_type=='old'){

        # Access able to new & old patients.

        $d_id = $request->input('doctor');

        $received = $request->input('received');
        $change = $request->input('change');
        $fee = $received-$change;

        $service_charge_percentage = $request->session()->get('PHYSIO_HOSPITAL_PERCENTAGE');
        $vat = $request->session()->get('VAT');

        # Calculate service charge.
        $service_charge = (($service_charge_percentage/100)*$fee);

        # Calculate gov vat & income.
        $gov_vat = (($vat/100)*$service_charge);
        $income = $service_charge-$gov_vat;

        $physio_log=array(

            'P_ID'=>$p_id,
            'R_ID'=>$request->session()->get('REC_SESSION_ID'),
            'D_ID'=>$d_id,
            'Received'=>$received,
            'Changes'=>$change,
            'Fee'=>$fee,
            'Reg_Date'=>$request->session()->get('reg_date')

        );

        DB::table('physio_log')->insert($physio_log);

        # Date.
        $todays_date = date("Ymd");

        # Generating message.
        $message='Physio services for: '.$p_id.', given by: '.$d_id;

        # Log entry on hospital balance log.
        $hospital_income_logs=array(

            'Message'=>$message,
            'Debit'=>0,
            'Credit'=>$fee,
            'Vat'=>$gov_vat,
            'Service_Charge'=>$service_charge,
            'Total_Income'=>$income,
            'Credit_Type'=>'Physio',
            'Entry_Date'=>$todays_date,
            'Entry_Time'=>date("H:i:s"),
            'Entry_Year'=>date("Y"),
            'User_ID'=>$request->session()->get('REC_SESSION_ID')

        );

        DB::table('hospital_income_log')
        ->insert($hospital_income_logs);

        $therapist_income = $fee - $service_charge;

        # checking current balance.
        $wallet=DB::table('doctor_balance_logs')
        ->where('D_ID',$d_id)
        ->orderBy('AI_ID','desc')
        ->first();

        if($wallet){
            $current_balance = $wallet->Current_Balance;
            $current_balance = $current_balance + $therapist_income;
        }else{
            $current_balance = 0;
            $current_balance = $current_balance + $therapist_income;
        }

        $log=array(

            'D_ID'=>$d_id,
            'B_Date'=>$request->session()->get('DATE_TODAY'),
            'Credit'=>$therapist_income,
            'Commission'=>0,
            'Income'=>$therapist_income,
            'Current_Balance'=>$current_balance,
            'Acc_ID'=>$request->session()->get('REC_SESSION_ID'),
            'O_ID'=>0

        );

        # Insert balance log.
        DB::table('doctor_balance_logs')
        ->insert($log);

        $wallet_value=array(

            'Wallet'=>$current_balance

        );

        # updating doctor wallet.
        $doctor_wallet=DB::table('doctors')
        ->where('D_ID',$d_id)
        ->update($wallet_value);

    }

    # Redirecting to [FUNCTION-NO::05], invoice controller.
    return redirect('/reception/invoice_list/physio/');

}

# End of function physio_log_create.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #































}


