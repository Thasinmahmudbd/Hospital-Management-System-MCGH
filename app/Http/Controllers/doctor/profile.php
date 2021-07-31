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
# Stored data in 8 sessions;
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
    session(['DOCTORS_BALANCE' => $basic_info->Balance]);

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
# This function has a chance of updating in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::02 ####
#########################
# Shows all the patient that are treated.

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
    ->get();

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
# Shows doctor schedule.

function show_schedule(Request $request){

    $d_id = $request->session()->get('DOC_SESSION_ID');
    
    # Getting schedule Info.
    $doctor_routine['routine']=DB::table('doctor_schedules')->where('D_ID',$d_id)->orderBy('F','asc')->get();

    # Returning to the view below.
    return view('hospital/doctor/schedule',$doctor_routine);

}

# End of function show_schedule.                            <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Shows doctor log.

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

    # Returning to the view below.
    return view('hospital/doctor/logs',$all_treated_patients);

}

# End of function show_logs.                                 <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




}
