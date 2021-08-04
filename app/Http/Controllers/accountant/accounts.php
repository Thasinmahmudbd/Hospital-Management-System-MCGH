<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class accounts extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Sets up required items before loading account home page;
# Stored data in 4 sessions;

function set_up_home(Request $request){

    $acc_id = $request->session()->get('ACC_SESSION_ID');
    
    # Getting all basic Info.
    $basic_info=DB::table('accounts')->where('Acc_ID',$acc_id)->first();

    session(['ACCOUNTANTS_NAME' => $basic_info->Acc_Name]);
    session(['ACCOUNTANTS_GENDER' => $basic_info->Acc_Gender]);

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");

    $timestamp = strtotime($date);
    $day = date('D', $timestamp);

    $test = $basic_info->AI_ID;
    $request->session()->put('DATE_TODAY',$date);
    $request->session()->put('DAY_TODAY',$day);
    $request->session()->put('test',$test);

    # Returning to the view below.
    return view('hospital/accounts/home');

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This will be updated in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Sets up required items before loading account home page;
# Stored data in 4 sessions;

function show_all_doctors(Request $request){

    $acc_id = $request->session()->get('ACC_SESSION_ID');
    
    # Returning to the view below.
    return view('hospital/accounts/doctor_income');

}

# End of function show_all_doctors.                         <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This will be updated in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
