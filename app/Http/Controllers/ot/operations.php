<?php

namespace App\Http\Controllers\ot;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class operations extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Sets up required items before loading ot home page.

function set_up_home(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);

    $user_id = $request->session()->get('OTO_SESSION_ID');

    # Getting reception info.
    $result=DB::table('ot_operator')->where('OTO_ID',$user_id)->get();

    $request->session()->put('OTO_NAME',$result[0]->OTO_Name);

    # Getting account variables.
    $acc_var=DB::table('account_variables')->orderBy('AI_ID','desc')->first();

    session(['VAT' => $acc_var->Vat]);
    session(['COMMISSION' => $acc_var->Commission]);

    $schedule['schedule']=DB::table('ot_schedules')
        ->select('*')
        ->orderBy('AI_ID','desc')
        ->get();

    $request->session()->put('KernelPoint','ot');

    # Returning to the view below.
    return view('hospital/ot/home',$schedule);

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
# Schedule data entry;
# Stores data in 9 sessions.

function store_new_schedule_data(Request $request){

    $p_id = $request->input('patient_id');

    $request->session()->put('ot_P_ID',$p_id);
    $request->session()->put('ot_OT_NO',$request->input('otno'));
    $request->session()->put('ot_Operation_Date',$request->input('operationDate'));
    $request->session()->put('ot_Operation_Start_Time',$request->input('operationTime'));
    $request->session()->put('ot_Operation_Type',$request->input('operationType'));
    $request->session()->put('ot_Estimated_Duration',$request->input('operationDuration'));
    $request->session()->put('REDIRECT','ot_scheduling');

    $check = DB::table('patients')->select('P_ID')->where('P_ID',$p_id)->first();

    if(!$check){
        $request->session()->flash('msg','Provided P_ID is non existent.');

        # Redirecting to view.
        return redirect('/ot/schedule/entry/');
    }

    # Redirecting to [FUNCTION-NO::::04], add_patient.php.
    return redirect('/ot/doctor_selection');

}

# End of function store_new_schedule_data.                  <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::03 ####
#########################
# Submits new schedule;
# Entry will happen on  --: TABLE :------ ot_schedules.

function submit_new_schedule(Request $request){

    $schedule_data=array(

        'P_ID'=>$request->session()->get('ot_P_ID'),
        'OT_No'=>$request->session()->get('ot_OT_NO'),
        'Operation_Date'=>$request->session()->get('ot_Operation_Date'),
        'Operation_Start_Time'=>$request->session()->get('ot_Operation_Start_Time'),
        'Operation_Type'=>$request->session()->get('ot_Operation_Type'),
        'Estimated_Duration'=>$request->session()->get('ot_Estimated_Duration'),
        'Surgeon_ID'=>$request->session()->get('D_ID'),
        'Surgeon_Name'=>$request->session()->get('D_NAME'),
        'OTO_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    DB::table('ot_schedules')->insert($schedule_data);

    $request->session()->put('schedule_crud_state','store');

    # Redirecting to [FUNCTION-NO::::04].
    return redirect('/ot/show/all/schedule');

}

# End of function submit_new_schedule.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Show schedule.

function show_schedule_data(Request $request){

    $schedule['schedule']=DB::table('ot_schedules')
        ->select('*')
        ->orderBy('AI_ID','desc')
        ->get();

    $check = $request->session()->get('schedule_crud_state');

    if($check == 'store'){

        $request->session()->flash('msg','New schedule added.');

    }elseif($check == 'edit'){

        $request->session()->flash('msg','Schedule edited.');

    }else{

        $request->session()->flash('msg','Schedule deleted.');

    }

    # Returning to the view below.
    return view('hospital/ot/home',$schedule);

}

# End of function show_schedule_data.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
#########################
# Edit schedule;
# Update will happen on --: TABLE :------ ot_schedules.

function edit_schedule_data(Request $request){

    $ai_id = $request->input('ai_id');
    
    $schedule_data=array(

        'OT_No'=>$request->input('otno'),
        'Operation_Date'=>$request->input('date'),
        'Operation_Start_Time'=>$request->input('time'),
        'Estimated_Duration'=>$request->input('estDuration'),
        'OTO_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    DB::table('ot_schedules')->where('AI_ID',$ai_id)->update($schedule_data);

    $request->session()->put('schedule_crud_state','edit');

    # Redirecting to [FUNCTION-NO::::04].
    return redirect('/ot/show/all/schedule');

}

# End of function edit_schedule_data.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::06 ####
#########################
# Delete schedule;
# Delete will happen on --: TABLE :------ ot_schedules.

function delete_schedule_data(Request $request, $ai_id){

    DB::table('ot_schedules')->where('AI_ID',$ai_id)->delete();

    $request->session()->put('schedule_crud_state','delete');

    # Redirecting to [FUNCTION-NO::::04].
    return redirect('/ot/show/all/schedule');

}

# End of function delete_schedule_data.                     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::07 ####
#########################
# Shows admitted patient list.

function show_admission_list(Request $request){
    
    $list['admission']=DB::table('admission_logs')
        ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
        ->select('admission_logs.*', 'patients.*')
        ->where('admission_logs.Payment_Confirmation',null)
        ->where('admission_logs.OT_Confirmation',null)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    # Returning to the view below.
    return view('hospital/ot/admission_list',$list);

}

# End of function show_admission_list.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::08 ####
#########################
# Select entry;
# Stores data in 15 sessions.

function select_entry(Request $request){

    $a_id = $request->input('a_id');

    $request->session()->put('OT_NEW_ENTRY_A_ID', $a_id);
    $request->session()->put('OT_NEW_ENTRY_P_ID', $request->input('p_id'));
    $request->session()->put('OT_NEW_ENTRY_D_ID', $request->input('d_id'));
    $request->session()->put('OT_NEW_ENTRY_P_NAME', $request->input('p_name'));

    $caught=DB::table('ot_logs')
        ->where('A_ID',$a_id)
        ->first();

    if($caught){

        $request->session()->put('o_type', $caught->O_Type);
        $request->session()->put('o_date', $caught->O_Date);
        $request->session()->put('o_time', $caught->O_Time);
        $request->session()->put('o_duration', $caught->O_Duration);
        $request->session()->put('a_type', $caught->Anesthesia_Type);

        $request->session()->put('ot_charge', $caught->OT_Charge);
        $request->session()->put('ot_charge_discount', $caught->OT_Charge_Discount);
        $request->session()->put('ot_other', $caught->Others);
        $request->session()->put('ot_other_charge', $caught->Others_Charges);

        $request->session()->put('O_ID', $caught->O_ID);
        $request->session()->put('REDIRECT', 'ot_new_entry');

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/ot/new/entry/all/data');

    }else{

        # Redirecting to a view.
        return redirect('/ot/new/entry/');

    }

}

# End of function ot_entry.                                 <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::09 ####
#########################
# Submit entry;
# Stored data on 14 sessions;
# Insert will happen on --: TABLE :------ ot_logs.

function submit_entry(Request $request){

    $p_id = $request->session()->get('OT_NEW_ENTRY_P_ID');
    $a_id = $request->session()->get('OT_NEW_ENTRY_A_ID');
    $d_id = $request->session()->get('OT_NEW_ENTRY_D_ID');

    $ot_charge = $request->input('ot_charge');
    $ot_charge_discount = $request->input('ot_charge_discount');
    $ot_charge_income = $ot_charge - $ot_charge_discount;
    $other_charge = $request->input('other_charges');
    $total = $ot_charge_income + $other_charge;

    $request->session()->put('o_type', $request->input('o_type'));
    $request->session()->put('o_date', $request->input('o_date'));
    $request->session()->put('o_time', $request->input('o_time'));
    $request->session()->put('o_duration', $request->input('o_duration'));
    $request->session()->put('a_type', $request->input('a_type'));

    $request->session()->put('ot_charge', $ot_charge);
    $request->session()->put('ot_charge_discount', $ot_charge_discount);
    $request->session()->put('ot_other', $request->input('others'));
    $request->session()->put('ot_other_charge', $other_charge);
    
    $ot_log_data=array(

        'P_ID'=>$p_id,
        'A_ID'=>$a_id,
        'D_ID'=>$d_id,
        'OTO_ID'=>$request->session()->get('OTO_SESSION_ID'),
        'OT_No'=>$request->input('otno'),
        'O_Type'=>$request->input('o_type'),
        'Anesthesia_Type'=>$request->input('a_type'),
        'O_Date'=>$request->input('o_date'),
        'O_Time'=>$request->input('o_time'),
        'O_Duration'=>$request->input('o_duration'),
        'OT_Charge'=>$ot_charge,
        'OT_Charge_Discount'=>$ot_charge_discount,
        'OT_Charge_Income'=>$ot_charge_income,
        'Others'=>$request->input('others'),
        'Others_Charges'=>$other_charge,
        'Total'=>$total

    );

    DB::table('ot_logs')->insert($ot_log_data);

    $hook=DB::table('ot_logs')->select('*')
        ->where('P_ID',$p_id)
        ->where('A_ID',$a_id)
        ->where('D_ID',$d_id)
        ->orderBy('O_ID','desc')
        ->first();

    $request->session()->put('O_ID', $hook->O_ID);
    $request->session()->put('REDIRECT', 'ot_new_entry');

    # Redirecting to [FUNCTION-NO::::04], add_patient.php.
    return redirect('/ot/doctor_selection');

}

# End of function edit_schedule_data.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::10 ####
#########################
# Inserts surgeon fee;
# Update doctor balance log;
# Insert will happen on --: TABLE :------ surgeon_logs;
# Insert will happen on --: TABLE :------ doctor_balance_logs.

function surgeon_fee_entry(Request $request){

    $o_id = $request->session()->get('O_ID');
    $d_id = $request->session()->get('D_ID');

    $surgeon_fee = $request->input('fee');
    $surgeon_discount = $request->input('discount');
    $surgeon_income = $surgeon_fee - $surgeon_discount;
    
    $surgeon_log_data=array(

        'D_ID'=>$d_id,
        'O_ID'=>$o_id,
        'Surgeon_Name'=>$request->session()->get('D_NAME'),
        'Surgeon_Fee'=>$surgeon_fee,
        'Surgeon_Discount'=>$surgeon_discount,
        'Surgeon_Income'=>$surgeon_income

    );

    DB::table('surgeon_logs')->insert($surgeon_log_data);

    # checking current balance.
    $wallet=DB::table('doctor_balance_logs')
    ->where('D_ID',$d_id)
    ->orderBy('AI_ID','desc')
    ->first();

    if($wallet){
        $current_balance = $wallet->Current_Balance;
        $current_balance = $current_balance + $surgeon_income;
    }else{
        $current_balance = 0;
        $current_balance = $current_balance + $surgeon_income;
    }

    $log=array(

        'D_ID'=>$d_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Credit'=>$surgeon_income,
        'Commission'=>0,
        'Income'=>$surgeon_income,
        'Current_Balance'=>$current_balance,
        'O_ID'=>$o_id,
        'Acc_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    # Insert balance log.
    DB::table('doctor_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating nurse wallet.
    $doctor_wallet=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function surgeon_fee_entry.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::11 ####
#########################
# Show all entry.

function show_all_entry(Request $request){

    $o_id = $request->session()->get('O_ID');

    $chosen_surgeons=DB::table('surgeon_logs')
        ->where('O_ID', $o_id)
        ->orderBy('AI_ID','asc')
        ->get();

    $chosen_anesthesiologist=DB::table('anesthesiologist_logs')
        ->where('O_ID', $o_id)
        ->orderBy('AI_ID','asc')
        ->get();

    $chosen_nurses=DB::table('ot_nurses_logs')
        ->where('O_ID', $o_id)
        ->orderBy('AI_ID','asc')
        ->get();

    $chosen_assistant=DB::table('ot_assistant_logs')
        ->where('O_ID', $o_id)
        ->orderBy('AI_ID','asc')
        ->get();
        
    # Returning to the view below.
    return view('hospital/ot/ot_entry_data_list', compact('chosen_surgeons','chosen_anesthesiologist','chosen_nurses','chosen_assistant'));

}

# End of function show_all_entry.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::12 ####
#########################
# Show all anesthesiologist.

function show_all_anesthesiologist(Request $request){

    $anesthesiologist['data']=DB::table('doctors')
        ->where('Department', 'Anesthesiology')
        ->orderBy('AI_ID','asc')
        ->get();

    $request->session()->put('list_data', 'anesthesiologist');

    # Returning to the view below.
    return view('hospital/ot/list', $anesthesiologist);

}

# End of function show_all_anesthesiologist.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::13 ####
#########################
# Selects anesthesiologist;
# Stores data in 3 sessions.

function select_anesthesiologist(Request $request, $d_id){

    $request->session()->put('Anesthesiologist_ID', $d_id);

    # checking current balance.
    $anesthesiologist=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->orderBy('AI_ID','desc')
    ->first();

    $request->session()->put('Anesthesiologist_Name', $anesthesiologist->Dr_Name);

    session(['fee_input_type' => 'anesthesiologist']);

    # Redirecting to view, hospital/ot/fee.
    return redirect('/ot/set/fees');

}

# End of function select_anesthesiologist.                  <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::14 ####
#########################
# Inserts anesthesiologist fee;
# Update doctor balance log;
# Insert will happen on --: TABLE :------ anesthesiologist_logs;
# Insert will happen on --: TABLE :------ doctor_balance_logs;
# Update will happen on --: TABLE :------ doctors.

function anesthesiologist_fee_entry(Request $request){

    $o_id = $request->session()->get('O_ID');
    $anesthesiologist_id = $request->session()->get('Anesthesiologist_ID');

    $fee = $request->input('fee');
    $discount = $request->input('discount');
    $income = $fee - $discount;
    
    $log_data=array(

        'Ans_ID'=>$anesthesiologist_id,
        'O_ID'=>$o_id,
        'Anesthesiologist_Name'=>$request->session()->get('Anesthesiologist_Name'),
        'Anesthesiologist_Fee'=>$fee,
        'Anesthesiologist_Discount'=>$discount,
        'Anesthesiologist_Income'=>$income

    );

    DB::table('anesthesiologist_logs')->insert($log_data);

    # checking current balance.
    $wallet=DB::table('doctor_balance_logs')
    ->where('D_ID',$anesthesiologist_id)
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

        'D_ID'=>$anesthesiologist_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Credit'=>$income,
        'Commission'=>0,
        'Income'=>$income,
        'Current_Balance'=>$current_balance,
        'O_ID'=>$o_id,
        'Acc_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    # Insert balance log.
    DB::table('doctor_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating nurse wallet.
    $doctor_wallet=DB::table('doctors')
    ->where('D_ID',$anesthesiologist_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function anesthesiologist_fee_entry.               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::15 ####
#########################
# Show all nurse.

function show_all_nurse(Request $request){

    $nurse['data']=DB::table('nurses')
        ->orderBy('AI_ID','asc')
        ->get();

    $request->session()->put('list_data', 'nurse');

    # Returning to the view below.
    return view('hospital/ot/list', $nurse);

}

# End of function show_all_nurse.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::16 ####
#########################
# Selects nurse;
# Stores data in 3 sessions.

function select_nurse(Request $request, $n_id){

    $request->session()->put('Nurse_ID', $n_id);

    # checking current balance.
    $nurse=DB::table('nurses')
    ->where('N_ID',$n_id)
    ->orderBy('AI_ID','desc')
    ->first();

    $request->session()->put('Nurse_Name', $nurse->N_Name);

    session(['fee_input_type' => 'nurse']);

    # Redirecting to view, hospital/ot/fee.
    return redirect('/ot/set/fees');

}

# End of function select_nurse.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::17 ####
#########################
# Inserts nurse fee;
# Update nurse table;
# Insert will happen on --: TABLE :------ ot_nurse_logs;
# Update will happen on --: TABLE :------ nurses.

function nurse_fee_entry(Request $request){

    $o_id = $request->session()->get('O_ID');
    $nurse_id = $request->session()->get('Nurse_ID');

    $fee = $request->input('fee');

    $log_data=array(

        'N_ID'=>$nurse_id,
        'O_ID'=>$o_id,
        'Nurse_Name'=>$request->session()->get('Nurse_Name'),
        'Nurse_Fee'=>$fee

    );

    DB::table('ot_nurses_logs')->insert($log_data);

    # checking current balance.
    $wallet=DB::table('nurse_balance_logs')
    ->where('N_ID',$nurse_id)
    ->orderBy('AI_ID','desc')
    ->first();

    if($wallet){
        $current_balance = $wallet->Current_Balance;
        $current_balance = $current_balance + $fee;
    }else{
        $current_balance = 0;
        $current_balance = $current_balance + $fee;
    }

    $log=array(

        'N_ID'=>$nurse_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Credit'=>$fee,
        'Current_Balance'=>$current_balance,
        'O_ID'=>$o_id,
        'Acc_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    # Insert balance log.
    DB::table('nurse_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating nurse wallet.
    $nurse_wallet=DB::table('nurses')
    ->where('N_ID',$nurse_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function nurse_fee_entry.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::18 ####
#########################
# Go to assistant select.

function assistant_data_collection(Request $request){

    session(['fee_input_type' => 'assistant']);

    # Redirecting to view, hospital/ot/fee.
    return redirect('/ot/set/fees');

}

# End of function assistant_data_collection.                <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::19 ####
#########################
# Inserts assistant data;
# Insert will happen on --: TABLE :------ ot_assistant_logs.

function assistant_data_entry(Request $request){

    $o_id = $request->session()->get('O_ID');

    $name = $request->input('name');
    $fee = $request->input('fee');

    $log_data=array(

        'O_ID'=>$o_id,
        'Assistant_Name'=>$name,
        'Assistant_Fee'=>$fee

    );

    DB::table('ot_assistant_logs')->insert($log_data);

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function assistant_data_entry.                     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::20 ####
#########################
# Delete surgeon entry;
# Update doctor balance log;
# Delete will happen on --: TABLE :------ surgeon_logs;
# Insert will happen on --: TABLE :------ doctor_balance_logs.

function delete_surgeon_entry(Request $request, $ai_id){

    $o_id = $request->session()->get('O_ID');

    # getting income info.
    $income=DB::table('surgeon_logs')
    ->where('AI_ID',$ai_id)
    ->first();
    
    $surgeon_income = $income->Surgeon_Income;
    $d_id = $income->D_ID;
    $o_id = $income->O_ID;

    DB::table('surgeon_logs')->where('AI_ID',$ai_id)->delete();

    # checking current balance.
    $wallet=DB::table('doctor_balance_logs')
    ->where('D_ID',$d_id)
    ->orderBy('AI_ID','desc')
    ->first();

    $current_balance = $wallet->Current_Balance;
    $current_balance = $current_balance - $surgeon_income;

    $log=array(

        'D_ID'=>$d_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Debit'=>$surgeon_income,
        'Commission'=>0,
        'Income'=>0,
        'Current_Balance'=>$current_balance,
        'O_ID'=>$o_id,
        'Acc_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    # Insert balance log.
    DB::table('doctor_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating nurse wallet.
    $doctor_wallet=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function delete_surgeon_entry.                     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::21 ####
#########################
# Delete anesthesiologist entry;
# Update doctor balance log;
# Delete will happen on --: TABLE :------ anesthesiologist_logs;
# Insert will happen on --: TABLE :------ doctor_balance_logs.

function delete_anesthesiologist_entry(Request $request, $ai_id){

    $o_id = $request->session()->get('O_ID');

    # getting income info.
    $income=DB::table('anesthesiologist_logs')
    ->where('AI_ID',$ai_id)
    ->first();
    
    $anesthesiologist_income = $income->Anesthesiologist_Income;
    $d_id = $income->Ans_ID;
    $o_id = $income->O_ID;

    DB::table('anesthesiologist_logs')->where('AI_ID',$ai_id)->delete();

    # checking current balance.
    $wallet=DB::table('doctor_balance_logs')
    ->where('D_ID',$d_id)
    ->orderBy('AI_ID','desc')
    ->first();

    $current_balance = $wallet->Current_Balance;
    $current_balance = $current_balance - $anesthesiologist_income;

    $log=array(

        'D_ID'=>$d_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Debit'=>$anesthesiologist_income,
        'Commission'=>0,
        'Income'=>0,
        'Current_Balance'=>$current_balance,
        'O_ID'=>$o_id,
        'Acc_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    # Insert balance log.
    DB::table('doctor_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating nurse wallet.
    $doctor_wallet=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function delete_anesthesiologist_entry.            <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::22 ####
#########################
# Delete nurse entry;
# Update nurse balance log;
# Delete will happen on --: TABLE :------ ot_nurses_logs;
# Insert will happen on --: TABLE :------ nurse_balance_logs.

function delete_nurse_entry(Request $request, $ai_id){

    $o_id = $request->session()->get('O_ID');

    # getting income info.
    $income=DB::table('ot_nurses_logs')
    ->where('AI_ID',$ai_id)
    ->first();
    
    $nurse_income = $income->Nurse_Fee;
    $n_id = $income->N_ID;
    $o_id = $income->O_ID;

    DB::table('ot_nurses_logs')->where('AI_ID',$ai_id)->delete();

    # checking current balance.
    $wallet=DB::table('nurse_balance_logs')
    ->where('N_ID',$n_id)
    ->orderBy('AI_ID','desc')
    ->first();

    $current_balance = $wallet->Current_Balance;
    $current_balance = $current_balance - $nurse_income;

    $log=array(

        'N_ID'=>$n_id,
        'B_Date'=>$request->session()->get('DATE_TODAY'),
        'Debit'=>$nurse_income,
        'Current_Balance'=>$current_balance,
        'O_ID'=>$o_id,
        'Acc_ID'=>$request->session()->get('OTO_SESSION_ID')

    );

    # Insert balance log.
    DB::table('nurse_balance_logs')
    ->insert($log);

    $wallet_value=array(

        'Wallet'=>$current_balance

    );

    # updating nurse wallet.
    $doctor_wallet=DB::table('nurses')
    ->where('N_ID',$n_id)
    ->update($wallet_value);

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function delete_nurse_entry.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::23 ####
#########################
# Delete assistant entry;
# Delete will happen on --: TABLE :------ ot_assistant_logs.

function delete_assistant_entry(Request $request, $ai_id){

    DB::table('ot_assistant_logs')->where('AI_ID',$ai_id)->delete();

    # Redirecting to [FUNCTION-NO::11].
    return redirect('/ot/new/entry/all/data');

}

# End of function delete_assistant_entry                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::24 ####
#########################
# Cancels new entry;
# Delete will happen on --: TABLE :------ ot_logs.

function cancel_new_entry(Request $request){

    $o_id = $request->session()->get('O_ID');

    # checking surgeon logs.
    $surgeon=DB::table('surgeon_logs')
    ->where('O_ID',$o_id)
    ->first();

    # checking anesthesiologist logs.
    $anesthesiologist=DB::table('anesthesiologist_logs')
    ->where('O_ID',$o_id)
    ->first();

    # checking surgeon logs.
    $nurse=DB::table('ot_nurses_logs')
    ->where('O_ID',$o_id)
    ->first();

    # checking surgeon logs.
    $assistant=DB::table('ot_assistant_logs')
    ->where('O_ID',$o_id)
    ->first();

    if($surgeon){

        $request->session()->flash('msg','Delete all Surgeon entry and try again.');

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/ot/new/entry/all/data');
        
    }elseif($anesthesiologist){

        $request->session()->flash('msg','Delete all Anesthesiologist entry and try again.');

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/ot/new/entry/all/data');
        
    }elseif($nurse){

        $request->session()->flash('msg','Delete all Nurse entry and try again.');

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/ot/new/entry/all/data');
        
    }elseif($assistant){

        $request->session()->flash('msg','Delete all Assistant entry and try again.');

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/ot/new/entry/all/data');
        
    }else{

        DB::table('ot_logs')->where('O_ID',$o_id)->delete();

        # Redirecting to [FUNCTION-NO::07].
        return redirect('/ot/admission/list/');

    }

}

# End of function nurse_fee_entry.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::25 ####
#########################
# Entry list submission;
# Delete will happen on --: TABLE :------ ot_logs.

function entry_list_submission(Request $request){

    $o_id = $request->session()->get('O_ID');

    # checking surgeon logs.
    $surgeon=DB::table('surgeon_logs')
    ->where('O_ID',$o_id)
    ->first();

    if($surgeon){

        $a_id = $request->session()->get('OT_NEW_ENTRY_A_ID');

        $ot_confirmation=array(

            'OT_Confirmation'=>1

        );
        
        # updating ot confirmation.
        $doctor_wallet=DB::table('admission_logs')
        ->where('A_ID',$a_id)
        ->update($ot_confirmation);

        $request->session()->flash('msg','Entry Confirmed.');

        # Redirecting to [FUNCTION-NO::07].
        return redirect('/ot/admission/list/');

    }else{

        $request->session()->flash('msg','Input at least 1 surgeon.');

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/ot/new/entry/all/data');

    }

}

# End of function entry_list_submission.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #










}
