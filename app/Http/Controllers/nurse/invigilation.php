<?php

namespace App\Http\Controllers\nurse;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;

class invigilation extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Sets up required items before loading ot home page.

function set_up_home(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);

    $user_id = $request->session()->get('NRS_SESSION_ID');

    # Getting reception info.
    $result=DB::table('nurses')->where('N_ID',$user_id)->get();

    $request->session()->put('N_NAME',$result[0]->N_Name);

    # Getting account variables.
    $acc_var=DB::table('account_variables')->orderBy('AI_ID','desc')->first();

    session(['VAT' => $acc_var->Vat]);
    session(['COMMISSION' => $acc_var->Commission]);

    $data['result']=DB::table('admission_logs')
    ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
    ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
    ->orderBy('admission_logs.A_ID','desc')
    ->get();

    $request->session()->put('KernelPoint','nurse');
    $request->session()->put('INVOICE','0');

    # Returning to the view below.
    return view('hospital/nurse/home',$data);

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
# Searches and shows result.

function search_patients(Request $request){

    $p_id = $request->input('old_patient_search_info');
    $floor_no = $request->input('floor_no');

    if(empty($p_id) && empty($floor_no)){

        $request->session()->put('SEARCH_RESULT','0');
        $request->session()->put('flag','0');

        # Redirecting to [FUNCTION-NO::01].
        return redirect('/nurse/home/');

    }elseif(empty($p_id)){

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('beds.Floor_No','like',$floor_no)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    }elseif(empty($floor_no)){

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('admission_logs.P_ID','like',$p_id)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    }else{

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('beds.Floor_No','like',$floor_no)
        ->where('admission_logs.P_ID','like',$p_id)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    }

        $request->session()->put('INVOICE','1');
        $request->session()->put('SEARCH_RESULT','1');

        # Returning to the view below.
        return view('hospital/nurse/home',$data);

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::03 ####
#########################
# Targets patient;

function target(Request $request, $a_id){

    $admission_data=DB::table('admission_logs')
        ->where('A_ID',$a_id)
        ->first();

    $p_id = $admission_data->P_ID;
    $b_id = $admission_data->B_ID;

    $patient_data=DB::table('patients')
        ->where('P_ID',$p_id)
        ->first();

    $bed_data=DB::table('beds')
        ->where('B_ID',$b_id)
        ->first();

    $request->session()->put('patient_name', $patient_data->Patient_Name); 
    $request->session()->put('bed_no', $bed_data->Bed_No); 
    $request->session()->put('floor_no', $bed_data->Floor_No); 

    $request->session()->put('a_id', $a_id);    
    $request->session()->put('REDIRECT', 'invigilator_selection');

    # Redirecting to [FUNCTION-NO::4], [C::add_patient.php].
    return redirect('/nurse/doctor_selection');

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Confirms invigilator;
# Entry will happen on  --: TABLE :------ bed_invigilators;
# Entry will happen on  --: TABLE :------ doctor_balance_log;
# Update will happen on --: TABLE :------ doctors.

function invigilator_confirmed(Request $request){

    $p_id = $request->input('old_patient_search_info');
    $floor_no = $request->input('floor_no');

    if(empty($p_id) && empty($floor_no)){

        $request->session()->put('SEARCH_RESULT','0');
        $request->session()->put('flag','0');

        # Redirecting to [FUNCTION-NO::01].
        return redirect('/nurse/home/');

    }elseif(empty($p_id)){

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('beds.Floor_No','like',$floor_no)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    }elseif(empty($floor_no)){

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('admission_logs.P_ID','like',$p_id)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    }else{

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('beds.Floor_No','like',$floor_no)
        ->where('admission_logs.P_ID','like',$p_id)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    }

        $request->session()->put('INVOICE','1');
        $request->session()->put('SEARCH_RESULT','1');

        # Returning to the view below.
        return view('hospital/nurse/home',$data);

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #

















}
