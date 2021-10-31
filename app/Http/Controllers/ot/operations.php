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
# Stores data in 8 sessions.

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
    return redirect('/reception/doctor_selection');

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

        'P_ID'=>$request->session()->get('ot_P_ID'),
        'OT_No'=>$request->input('otno'),
        'Operation_Date'=>$request->input('date'),
        'Operation_Start_Time'=>$request->input('time'),
        'Operation_Type'=>$request->session()->get('ot_Operation_Type'),
        'Estimated_Duration'=>$request->input('estDuration'),
        'Surgeon_ID'=>$request->session()->get('D_ID'),
        'Surgeon_Name'=>$request->session()->get('D_NAME'),
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
# Stores data in 4 sessions.

function select_entry(Request $request){

    $request->session()->put('OT_NEW_ENTRY_A_ID', $request->input('a_id'));
    $request->session()->put('OT_NEW_ENTRY_P_ID', $request->input('p_id'));
    $request->session()->put('OT_NEW_ENTRY_D_ID', $request->input('d_id'));
    $request->session()->put('OT_NEW_ENTRY_P_NAME', $request->input('p_name'));

    # Redirecting to a view.
    return redirect('/ot/new/entry/');

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
# Update will happen on --: TABLE :------ ot_logs.

function submit_entry(Request $request){

    $p_id = $request->session()->get('OT_NEW_ENTRY_P_ID');
    $a_id = $request->session()->get('OT_NEW_ENTRY_A_ID');
    $d_id = $request->session()->get('OT_NEW_ENTRY_D_ID');

    $ot_charge = $request->input('ot_charge');
    $ot_charge_discount = $request->input('ot_charge_discount');
    $ot_charge_income = $ot_charge - $ot_charge_discount;
    $other_charge = $request->input('other_charges');
    $total = $ot_charge_income + $other_charge;
    
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
        ->first();

    $request->session()->put('O_ID', $hook->O_ID);

    # Redirecting to [FUNCTION-NO::::04], add_patient.php.
    return redirect('/reception/doctor_selection');

}

# End of function edit_schedule_data.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #





}
