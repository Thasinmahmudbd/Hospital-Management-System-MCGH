<?php

namespace App\Http\Controllers\reception;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $request->session()->put('KernelPoint','reception');

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
            'nid'=>'required',
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
# Entry will happen on  --: TABLE :------ patients.
# Entry will happen on  --: TABLE :------ patient_logs.
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
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ patient_logs,
# -----: TABLE :------ doctor_schedules;
# Reads data from joined table.

    function show_list(){

        $data['result']=DB::table('patient_logs')
        ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
        ->join('doctors', 'patient_logs.D_ID', '=', 'doctors.D_ID')
        ->select('patient_logs.*', 'patients.*', 'doctors.*')
        ->orderBy('patient_logs.AI_ID','desc')
        ->get();
        
        # Returning to the view below.
        return view('hospital/reception/patient_list',$data);

    }

# End of function show_list.                                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note:
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::14 ####
#########################
# Retrieves data from form;
# Stores data in 14 sessions.

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
                'Admission_Fee'=>$request->session()->get('ADMISSION_FEE'),
                'Paid_Amount'=>$request->input('received'),
                'Changes'=>$request->input('change'),
                
            );

            DB::table('admission_logs')->insert($admission_logs);

            # Data insert on Table:----hospital_income_log.

            $vat = $request->session()->get('VAT');
            $credit = $request->session()->get('ADMISSION_FEE');
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

}

# End of function patient_data_entry_for_doctor_appointment.<-------#
                                                                #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #

}

