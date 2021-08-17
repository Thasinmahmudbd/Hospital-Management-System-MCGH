<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class profile extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Sets up required items before loading doctor home page;
# Stored data in 12 sessions;
# Gets doctors schedule data.

function set_up_home(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    
    # Getting all basic Info.
    $basic_info=DB::table('doctors')->where('D_ID',$d_id)->first();

    session(['DOCTORS_NAME' => $basic_info->Dr_Name]);
    session(['DOCTORS_GENDER' => $basic_info->Dr_Gender]);
    session(['DOCTORS_SPECIALTY' => $basic_info->Specialty]);
    session(['DOCTORS_DEPARTMENT' => $basic_info->Department]);
    session(['DOCTORS_IMAGE' => $basic_info->Dr_Image]);
    session(['DOCTORS_BASIC_FEE' => $basic_info->Basic_Fee]);
    session(['DOCTORS_DISCOUNT' => $basic_info->Second_Visit_Discount]);
    session(['DOCTORS_BALANCE' => $basic_info->Wallet]);

    # Getting account variables.
    $acc_var=DB::table('account_variables')->orderBy('AI_ID','desc')->first();

    session(['VAT' => $acc_var->Vat]);
    session(['COMMISSION' => $acc_var->Commission]);

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");

    $timestamp = strtotime($date);
    $day = date('D', $timestamp);

    $request->session()->put('DATE_TODAY',$date);
    $request->session()->put('DAY_TODAY',$day);

    # Getting schedule Info.
    $doctor_routine['routine']=DB::table('doctor_schedules')->where('D_ID',$d_id)->orderBy('F','asc')->get();

    # Returning to the view below.
    return view('hospital/doctor/home',$doctor_routine);

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::02 ####
#########################
# Shows all the patient that are treated;
# Stores data in 3 session.

function show_treated_patients(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    $today = $request->session()->get('DATE_TODAY');
    
    # Getting patients treated today.
    $treated_patients['patients']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->select('patient_logs.*', 'patients.*')
    ->where('patient_logs.D_ID',$d_id)
    ->where('patient_logs.Treatment_Status',1)
    ->where('patient_logs.Ap_Date',$today)
    ->where('patient_logs.Payment_Status','Paid')
    ->orderBy('patient_logs.AI_ID','desc')
    ->get();

    # Counting untreated patients.
    $count_untreated['untreated']=DB::table('patient_logs')
    ->where('D_ID',$d_id)
    ->where('Treatment_Status',0)
    ->where('Ap_Date',$today)
    ->where('Payment_Status','Paid')
    ->orderBy('AI_ID','desc')
    ->get();

    session(['TREATED' => count($treated_patients['patients'])]);
    session(['UNTREATED' => count($count_untreated['untreated'])]);
    session(['PATIENT_SEARCH_RESULT' => 'negative']);

    # Returning to the view below.
    return view('hospital/doctor/patient_list',$treated_patients);

}

# End of function show_treated_patients.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::03 ####
#########################
# Searches patients;
# Shows all the patient that are treated;
# Stores data in 4 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ patient_logs.

function search_patient(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    $today = $request->session()->get('DATE_TODAY');
    
    # validating data from form.
    $request->validate([

        'p_id'=>'required',
        'random_code'=>'required'

    ]);

    $p_id = $request->input('p_id');
    $r_c = $request->input('random_code');

    # Searching patients.
    $patient['result']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->select('patient_logs.*', 'patients.*')
    ->where('patient_logs.P_ID',$p_id)
    ->where('patient_logs.D_ID',$d_id)
    ->where('patient_logs.Treatment_Status',0)
    ->where('patient_logs.Payment_Status','Paid')
    ->where('patient_logs.Random_code',$r_c)
    ->orderBy('patient_logs.AI_ID','desc')
    ->get();
    
    if(count($patient['result'])==0){

        session(['PATIENT_SEARCH_RESULT' => 'negative']);

        $request->session()->flash('msg','Sorry, but none fits your description.');

    }else{

        session(['PATIENT_SEARCH_RESULT' => 'positive']);

    }
    
    # Getting patients treated today.
    $treated_patients['patients']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->select('patient_logs.*', 'patients.*')
    ->where('patient_logs.D_ID',$d_id)
    ->where('patient_logs.Treatment_Status',1)
    ->where('patient_logs.Ap_Date',$today)
    ->where('patient_logs.Payment_Status','Paid')
    ->orderBy('patient_logs.AI_ID','desc')
    ->get();

    # Counting untreated patients.
    $count_untreated['untreated']=DB::table('patient_logs')
    ->where('D_ID',$d_id)
    ->where('Treatment_Status',0)
    ->where('Ap_Date',$today)
    ->where('Payment_Status','Paid')
    ->orderBy('AI_ID','desc')
    ->get();

    date_default_timezone_set('Asia/Dhaka');
    $time = date("h:i:sa");

    $request->session()->put('CURRENT_TIME',$time);
    session(['TREATED' => count($treated_patients['patients'])]);
    session(['UNTREATED' => count($count_untreated['untreated'])]);

    # Returning to the view below.
    return view('hospital/doctor/patient_list',$patient,$treated_patients);

}

# End of function search_patient.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Sets status to treated;
# Update will happen on  --: TABLE :------ patient_logs;
# Update will happen on  --: TABLE :------ patients
# Insert will happen on  --: TABLE :------ doctor_balance_logs

function set_patient_as_treated(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    
    # validating data from form.
    $request->validate([

        'p_id'=>'required',

    ]);

    $p_id = $request->input('p_id');

    $status=array(

        'Treatment_Status'=>1
        
    );

    # Finding AI_ID.
    $ID=DB::table('patient_logs')
    ->where('D_ID',$d_id)
    ->where('P_ID',$p_id)
    ->where('Treatment_Status',0)
    ->where('Payment_Status','Paid')
    ->orderBy('AI_ID','desc')
    ->first();

    # Updating status.
    DB::table('patient_logs')
    ->where('AI_ID',$ID->AI_ID)
    ->update($status);

    $final_fee = $ID->Final_Fee;
    $vat = $request->session()->get('VAT');
    $commission = $request->session()->get('COMMISSION');
    $rest = 100-($vat+$commission);
    $income = ($rest/100)*$final_fee;
    $gov_vat = ($vat/100)*$final_fee;
    $hos_commission = ($commission/100)*$final_fee;

    # checking current balance.
    $wallet=DB::table('doctor_balance_logs')
    ->where('D_ID',$d_id)
    ->orderBy('AI_ID','desc')
    ->first();

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
        'Credit'=>$final_fee,
        'Gov_Vat'=>$gov_vat,
        'Commission'=>$hos_commission,
        'Income'=>$income,
        'Current_Balance'=>$current_balance

    );

    # Insert balance log.
    DB::table('doctor_balance_logs')
    ->insert($log);

    $data=array(

        'Wallet'=>$current_balance

    );

    # update wallet.
    DB::table('doctors')
    ->where('D_ID',$d_id)
    ->update($data);

    $request->session()->flash('msg','Congratulation, list has been updated.');

    # Redirecting to [FUNCTION-NO::02].
    return redirect('/doctor/patients/');

}

# End of function set_patient_as_treated.                   <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# This function will in future send data to accounts table.
# Function not finished.
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
#########################
# Shows doctor schedule;
# Gets doctor data.

function show_schedule(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    
    # Getting schedule Info.
    $doctor_routine['routine']=DB::table('doctor_schedules')->where('D_ID',$d_id)->orderBy('F','asc')->get();

    # Getting doctor Info.
    $doctor['info']=DB::table('doctors')->where('D_ID',$d_id)->get();

    # Returning to the view below.
    return view('hospital/doctor/schedule',$doctor_routine,$doctor);

}

# End of function show_schedule.                            <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::06 ####
#########################
# Adding shift;
# Entry will happen on --: TABLE :------ doctor_schedules.

function add_shift(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    
    # Requirement check.
    $request->validate([

        'from'=>'required',
        'to'=>'required'

    ]);

    $shift=array(

        'D_ID'=>$d_id,
        'F'=>$request->input('from'),
        'T'=>$request->input('to'),
        'Sat'=>'A',
        'Sun'=>'A',
        'Mon'=>'A',
        'Tue'=>'A',
        'Wed'=>'A',
        'Thu'=>'A',
        'Fri'=>'A'
        
    );

    # Inserting shift.
    DB::table('doctor_schedules')->insert($shift);

    # Session flash message.
    $msg = 'Shift added successfully.';
    $request->session()->flash('msg',$msg);

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/doctor/schedule/');

}

# End of function add_shift.                                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::07 ####
#########################
# Updating to N/A;
# Update will happen on --: TABLE :------ doctor_schedules.

function not_available($ai_id, $day){

    $data=array(

        $day=>'N/A'
        
    );

    # Updating to N/A.
    DB::table('doctor_schedules')->where('AI_ID',$ai_id)->update($data);

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/doctor/schedule/');

}

# End of not_available.                                     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::08 ####
#########################
# Updating to A;
# Update will happen on --: TABLE :------ doctor_schedules.

function available($ai_id, $day){

    $data=array(

        $day=>'A'
        
    );

    # Updating to N/A.
    DB::table('doctor_schedules')->where('AI_ID',$ai_id)->update($data);

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/doctor/schedule/');

}

# End of available.                                         <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::09 ####
#########################
# Rescheduling patients.

function reschedule(Request $request){

    # Session flash message.
    $msg = 'Seems like there are appointments present in this slot. Reschedule them first in order to edit routine.';
    $request->session()->flash('msg',$msg);

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/doctor/schedule/');

}

# End of reschedule.                                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::10 ####
#########################
# Delete shift;
# Delete will happen on --: TABLE :------ doctor_schedules.

function delete_shift(Request $request, $ai_id){

    # Getting schedule Info.
    $doctor_routine=DB::table('doctor_schedules')->where('AI_ID',$ai_id)->first();

    $sat = $doctor_routine->Sat;
    $sun = $doctor_routine->Sun;
    $mon = $doctor_routine->Mon;
    $tue = $doctor_routine->Thu;
    $wed = $doctor_routine->Wed;
    $thu = $doctor_routine->Thu;
    $fri = $doctor_routine->Fri;
    
    if( ($sat=='A' || $sat=='N/A') &&
        ($sun=='A' || $sun=='N/A') &&
        ($mon=='A' || $mon=='N/A') && 
        ($tue=='A' || $tue=='N/A') &&
        ($wed=='A' || $wed=='N/A') &&
        ($thu=='A' || $thu=='N/A') &&
        ($fri=='A' || $fri=='N/A') ){

        # Delete shift.
        DB::table('doctor_schedules')->where('AI_ID',$ai_id)->delete();

        # Session flash message.
        $msg = 'Shift deleted successfully.';
        $request->session()->flash('msg',$msg);

    }else{

        # Session flash message.
        $msg = 'Seems like there are appointments present in some of the slots. Cancel them first in order to delete shift.';
        $request->session()->flash('msg',$msg); 

    }

    

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/doctor/schedule/');

}

# End of delete_shift.                                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# This function is not complete.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::11 ####
#########################
# Set patient capacity;
# Update will happen on --: TABLE :------ doctors.

function patient_cap(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');

    # validating data from form.
    $request->validate([

        'patient_cap'=>'required'

    ]);

    # Getting form data.
    $data=array(

        'Patient_Cap'=>$request->input('patient_cap')

    );

    # Updating patient cap.
    DB::table('doctors')->where('D_ID',$d_id)->update($data);

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/doctor/schedule/');

}

# End of patient_cap.                                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::12 ####
#########################
# Gets all treated patients data;
# Stores data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ patient_logs.

function show_logs(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    
    # Getting all treated patients Info.
    $all_treated_patients['patients']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->select('patient_logs.*', 'patients.*')
    ->where('patient_logs.D_ID',$d_id)
    ->where('patient_logs.Treatment_Status',1)
    ->where('patient_logs.Payment_Status','Paid')
    ->get();

    session(['LOG_LIMIT' => '']);

    # Returning to the view below.
    return view('hospital/doctor/logs',$all_treated_patients);

}

# End of function show_logs.                                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::13 ####
#########################
# Searches doctor log;
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ patient_logs.

function search_logs(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');

    # validating data from form.
    $request->validate([

        'search_from'=>'required',
        'search_to'=>'required'

    ]);

    # Getting data from form.
    $from = $request->input('search_from');
    $to = $request->input('search_to');


    # Getting patients treated today.
    $search['patients']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->select('patient_logs.*', 'patients.*')
    ->where('patient_logs.D_ID',$d_id)
    ->where('patient_logs.Treatment_Status',1)
    ->whereBetween('patient_logs.Ap_Date', [$from, $to])
    ->where('patient_logs.Payment_Status','Paid')
    ->orderBy('patient_logs.AI_ID','desc')
    ->get();

    session(['LOG_LIMIT' => 'from['.$from.' - '.$to.'].']);

    # Returning to the view below.
    return view('hospital/doctor/logs',$search);

}

# End of function search_logs.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::14 ####
#########################
# Edit doctor profile;
# Update will happen on --: TABLE :------ doctors.

function edit_profile(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    
    # validating data from form.
    $request->validate([

        'doc_name'=>'required',
        'doc_dept'=>'required',
        'doc_specialty'=>'required',
        'profile_photo'=>'image|dimensions:ratio=1/1|mimes:jpg,jpeg,png|dimensions:min_width=200,min_height=200,max_width=600,max_height=600|max:2048'

    ]);

    # Getting data from form.
    $data=array(

        'Dr_Name'=>$request->input('doc_name'),
        'Department'=>$request->input('doc_dept'),
        'Specialty'=>$request->input('doc_specialty')
        
    );

    if($request->hasfile('profile_photo')){

        $image=$request->file('profile_photo');
        $ext=$image->extension();
        $file=$d_id.'.'.$ext;
        $image->storeAs('/public/doctor_profile_pictures',$file);

        $data['Dr_Image']=$file;

    }

    

    DB::table('doctors')->where('D_ID',$d_id)->update($data);
    
    $request->session()->flash('msg','Profile updated successfully.');

    # Redirecting to [FUNCTION-NO::].
    return redirect('/doctor/home/');

}

# End of function edit_profile.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# This function might get an update in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #








}
