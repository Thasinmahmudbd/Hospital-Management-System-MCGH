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
    session(['INVIGILATOR_FEE' => $acc_var->Invigilator_Fee]);

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

        $request->session()->flash('msg','Fill up at-least one section.');

        # Redirecting to [FUNCTION-NO::01].
        return redirect('/nurse/home/');

    }elseif(empty($p_id)){

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('beds.Floor_No','like',$floor_no)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

        $count = count($data);

    }elseif(empty($floor_no)){

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('admission_logs.P_ID','like',$p_id)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

        $count = count($data);

    }else{

        $data['result']=DB::table('admission_logs')
        ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
        ->select('admission_logs.A_ID', 'admission_logs.P_ID', 'beds.B_ID', 'beds.Bed_No', 'beds.Floor_No')
        ->where('beds.Floor_No','like',$floor_no)
        ->where('admission_logs.P_ID','like',$p_id)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

        $count = count($data);

    }

    if($count == 0){
        $request->session()->flash('msg','Records not found.');
    }else{
        $request->session()->flash('msg','Records found.');
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

function target(Request $request, $a_id, $target_path){

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

    $request->session()->put('patient_id', $p_id);
    $request->session()->put('patient_name', $patient_data->Patient_Name); 
    $request->session()->put('b_id', $bed_data->B_ID);
    $request->session()->put('bed_no', $bed_data->Bed_No); 
    $request->session()->put('floor_no', $bed_data->Floor_No); 

    $request->session()->put('a_id', $a_id);    
    $request->session()->put('REDIRECT', 'invigilator_selection');

    if($target_path == 'other'){

        $others['info']=DB::table('others_info')
            ->get();

        $patient['chart']=DB::table('bed_invigilators')
            ->where('A_ID',$a_id)
            ->orderBy('A_ID','desc')
            ->get();

        # Returning to the view below.
        return view('hospital/nurse/other_input',$others,$patient);

    }else{

        # Redirecting to [FUNCTION-NO::4], [C::add_patient.php].
        return redirect('/nurse/doctor_selection');

    }

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
# Insert will happen on  --: TABLE :------ bed_invigilators;
# Insert will happen on  --: TABLE :------ doctor_balance_log;
# Update will happen on --: TABLE :------ doctors.

function invigilator_confirmed(Request $request){

    $d_id = $request->session()->get('D_ID');
    $income = $request->session()->get('INVIGILATOR_FEE');

    $invigilation_data=array(

        'A_ID'=>$request->session()->get('a_id'),
        'D_ID'=>$d_id,
        'N_ID'=>$request->session()->get('NRS_SESSION_ID'),
        'B_ID'=>$request->session()->get('b_id'),
        'Visit_Date'=>$request->session()->get('DATE_TODAY'),
        'Visit_Charge'=>$request->session()->get('INVIGILATOR_FEE')

    );

    # Insert bed invigilator info.
    DB::table('bed_invigilators')
        ->insert($invigilation_data);

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
        'Credit'=>$income,
        'Commission'=>0,
        'Income'=>$income,
        'Current_Balance'=>$current_balance,
        'O_ID'=>0,
        'Acc_ID'=>$request->session()->get('NRS_SESSION_ID')

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

    $request->session()->flash('msg','Invigilation recorded successfully.');

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/nurse/home/');

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
#########################
# Other info submission;
# Generates personal selection list.

function other_Info_Submission(Request $request){

    $request->session()->put('DMO', 'no');
    $request->session()->put('Hospital', 'no');
    $request->session()->put('Nurse', 'no');
    $request->session()->put('Assistant', 'no');

    $request->validate([

        'service'=>'required',
        'quantity'=>'required'

    ]);

    $service = $request->input('service');
    $quantity = $request->input('quantity');

    $request->session()->put('service', $service);
    $request->session()->put('quantity', $quantity);

    # checking service type.
    $service_type=DB::table('others_info')
        ->where('AI_ID',$service)
        ->first();

    $Service_Name = $service_type->Other_Name;
    $Hospital = $service_type->Hospital;
    $DMO = $service_type->DMO;
    $Nurse = $service_type->Nurse;
    $Assistant = $service_type->Assistant;
    $charge = $service_type->Total;

    $request->session()->put('Service_Name', $Service_Name);

    $total_charge=$charge*$quantity;
    $request->session()->put('Service_Charge', $total_charge);
    
    if($DMO > 0){

        $request->session()->put('DMO', 'yes');
        $request->session()->put('DMO_cut', $DMO);

        # doctor list.
        $doctor['info']=DB::table('doctors')
            ->orderBy('D_ID','desc')
            ->get();

    }if($Hospital > 0){

        $request->session()->put('Hospital', 'yes');
        $request->session()->put('Hospital_cut', $Hospital);

    }if($Nurse > 0){

        $request->session()->put('Nurse', 'yes');
        $request->session()->put('Nurse_cut', $Nurse);

        # nurse list.
        $nurse['info2']=DB::table('nurses')
            ->orderBy('N_ID','desc')
            ->get();

    }if($Assistant > 0){

        $request->session()->put('Assistant', 'yes');
        $request->session()->put('Assistant_cut', $Assistant);

    }

    if($DMO > 0 && $Nurse > 0){

        # Returning to the view below.
        return view('hospital/nurse/select_personal',$doctor,$nurse);

    }elseif($DMO > 0){

        # Returning to the view below.
        return view('hospital/nurse/select_personal',$doctor);

    }elseif($Nurse > 0){

        # Returning to the view below.
        return view('hospital/nurse/select_personal',$nurse);

    }elseif($DMO == 0 && $Nurse == 0){

        # Returning to the view below.
        return view('hospital/nurse/select_personal');

    }

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::06 ####
#########################
# Other info submission complete;
# Insert will happen on  --: TABLE :------ bed_invigilators;
# Insert will happen on  --: TABLE :------ hospital_income_log;
# Insert might happen on --: TABLE :------ doctor_balance_log;
# Update might happen on --: TABLE :------ doctors;
# Insert might happen on --: TABLE :------ nurse_balance_log;
# Update might happen on --: TABLE :------ nurses;

function other_info_submission_complete(Request $request){

    /* Check DMO availability */

    if($request->session()->get('DMO') == 'yes'){

        $d_id = $request->input('dmo');

        # checking current balance.
        $wallet=DB::table('doctor_balance_logs')
            ->where('D_ID',$d_id)
            ->orderBy('AI_ID','desc')
            ->first();

        $cut = $request->session()->get('DMO_cut');
        $times = $request->session()->get('quantity');
        $income = $cut * $times;

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
            'Acc_ID'=>$request->session()->get('NRS_SESSION_ID')

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

    }else{
        $d_id = 'None';
    }

    /* Check Nurse availability */
    
    if($request->session()->get('Nurse') == 'yes'){

        $n_id = $request->input('nurse');

        # checking current balance.
        $wallet=DB::table('nurse_balance_logs')
            ->where('N_ID',$n_id)
            ->orderBy('AI_ID','desc')
            ->first();

        $cut = $request->session()->get('Nurse_cut');
        $times = $request->session()->get('quantity');
        $fee = $cut * $times;

        if($wallet){
            $current_balance = $wallet->Current_Balance;
            $current_balance = $current_balance + $fee;
        }else{
            $current_balance = 0;
            $current_balance = $current_balance + $fee;
        }

        $log=array(

            'N_ID'=>$n_id,
            'B_Date'=>$request->session()->get('DATE_TODAY'),
            'Credit'=>$fee,
            'Current_Balance'=>$current_balance,
            'Acc_ID'=>$request->session()->get('NRS_SESSION_ID')

        );

        # Insert balance log.
        DB::table('nurse_balance_logs')
            ->insert($log);

        $wallet_value=array(

            'Wallet'=>$current_balance

        );

        # updating nurse wallet.
        $nurse_wallet=DB::table('nurses')
            ->where('N_ID',$n_id)
            ->update($wallet_value);

    }else{
        $n_id = 'None';
    }

    /* Check Assistant availability */

    if($request->session()->get('Assistant') == 'yes'){
        $cut = $request->session()->get('Assistant_cut');
        $times = $request->session()->get('quantity');
        $assistant_fee = $cut * $times;
        $assistant = $request->input('assistant_name');
    }else{
        $assistant_fee = 0;
        $assistant = 'None';
    }

    # Insert to invigilator log.
    $invigilation_data=array(

        'A_ID'=>$request->session()->get('a_id'),
        'D_ID'=>$d_id,
        'Duty_N_ID'=>$n_id,
        'Assistant_Name'=>$assistant,
        'Assistant_Fee'=>$assistant_fee,
        'N_ID'=>$request->session()->get('NRS_SESSION_ID'),
        'B_ID'=>$request->session()->get('b_id'),
        'Visit_Date'=>$request->session()->get('DATE_TODAY'),
        'Visit_Charge'=>0,
        'Others'=>$request->session()->get('Service_Name'),
        'Others_Fee'=>$request->session()->get('Service_Charge'),
        'Others_Use_Count'=>$request->session()->get('quantity')

    );

    # Insert bed invigilator info.
    DB::table('bed_invigilators')
        ->insert($invigilation_data);

    # Data insert on Table:----hospital_income_log.
    $vat = $request->session()->get('VAT');
    $credit = $request->session()->get('Hospital_cut')*$request->session()->get('quantity');
    $gov_vat = ($vat/100)*$credit;
    $income = $credit-$gov_vat;

    $message=$request->session()->get('Service_Name').' fee from patient: '.$request->session()->get('patient_id');
    $todays_date = date("Ymd");

    $hospital_income_logs=array(

        'Message'=>$message,
        'Debit'=>0,
        'Credit'=>$credit,
        'Vat'=>$gov_vat,
        'Service_Charge'=>$income,
        'Total_Income'=>$income,
        'Credit_Type'=>$request->session()->get('Service_Name'),
        'Entry_Date'=>$todays_date,
        'Entry_Time'=>date("H:i:s"),
        'Entry_Year'=>date("Y"),
        'User_ID'=>$request->session()->get('NRS_SESSION_ID')

    );

    DB::table('hospital_income_log')->insert($hospital_income_logs);

    $request->session()->flash('msg','Services recorded successfully.');

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/nurse/home/');

}

# End of function set_up_home.                              <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
















}
