<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class admin extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Sets up required items before loading admin home page;
# Stored data in 20 sessions.

function set_up_home(Request $request){

    $ad_id = $request->session()->get('ADMIN_SESSION_ID');
    
    # Getting all basic Info.
    $basic_info=DB::table('admin')->where('Ad_ID',$ad_id)->first();

    session(['ADMIN_NAME' => $basic_info->Ad_Name]);
    session(['ADMIN_GENDER' => $basic_info->Ad_Gender]);
    session(['ADMIN_EMAIL' => $basic_info->Ad_Email]);
    session(['ADMIN_PHONE' => $basic_info->Ad_Phone]);
    session(['ADMIN_IMAGE' => $basic_info->Ad_Image]);

    # Getting all account variables.
    $acc_var=DB::table('account_variables')
    ->orderBy('AI_ID','desc')
    ->first();

    $vat = $acc_var->Vat;
    $commission = $acc_var->Commission;
    $invigilator_fee = $acc_var->Invigilator_Fee;
    $emergency_fee = $acc_var->Emergency_Fee;
    $er_hospital_percentage = $acc_var->ER_Hospital_Percentage;
    $dental_hospital_percentage = $acc_var->Dental_Hospital_Percentage;
    $pathology_hospital_percentage = $acc_var->Pathology_Hospital_Percentage;
    $physio_hospital_percentage = $acc_var->Physio_Hospital_Percentage;
    $ligation = $acc_var->Ligation;
    $third_seizure = $acc_var->Third_Seizure;

    session(['VAT' => $vat]);
    session(['COMMISSION' => $commission]);
    session(['Invigilator_Fee' => $invigilator_fee]);
    session(['Emergency_Fee' => $emergency_fee]);
    session(['ER_Hospital_Percentage' => $er_hospital_percentage]);
    session(['Dental_Hospital_Percentage' => $dental_hospital_percentage]);
    session(['Pathology_Hospital_Percentage' => $pathology_hospital_percentage]);
    session(['Physio_Hospital_Percentage' => $physio_hospital_percentage]);
    session(['Ligation' => $ligation]);
    session(['Third_Seizure' => $third_seizure]);

    $rest = 100-($vat+$commission);

    session(['REST' => $rest]);

    # Date and day set up.
    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");

    $timestamp = strtotime($date);
    $day = date('D', $timestamp);

    $request->session()->put('DATE_TODAY',$date);
    $request->session()->put('DAY_TODAY',$day);

    $request->session()->put('log_access_type','admin');

    # Returning to the view below.
    return view('hospital/admin/home');

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This will be updated in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::02 ####
#########################
# Shows doctor list.

function doctor_list_browse(Request $request){

    $available_data['result']=DB::table('doctors')
        ->join('logins', 'doctors.D_ID', '=', 'logins.Emp_ID')
        ->select('doctors.*','logins.status')
        ->orderBy('doctors.AI_ID','asc')
        ->get();

    $request->session()->put('INVOICE','0');

    # Returning to the view below.
    return view('hospital/admin/doctor_list', $available_data);

}

# End of function doctor_list_browse.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #











}
