<?php

namespace App\Http\Controllers\accountant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTime;

class accounts extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Sets up required items before loading account home page;
# Stored data in 22 sessions.

function set_up_home(Request $request){

    $acc_id = $request->session()->get('ACC_SESSION_ID');
    
    # Getting all basic Info.
    $basic_info=DB::table('accounts')->where('Acc_ID',$acc_id)->first();

    session(['ACCOUNTANTS_NAME' => $basic_info->Acc_Name]);
    session(['ACCOUNTANTS_GENDER' => $basic_info->Acc_Gender]);
    session(['ACCOUNTANTS_EMAIL' => $basic_info->Acc_Email]);
    session(['ACCOUNTANTS_PHONE' => $basic_info->Acc_Phone]);
    session(['ACCOUNTANTS_IMAGE' => $basic_info->Acc_Image]);

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
    session(['pay_salary_person' => 'Doctors']);

    session(['logs_hook' => 'Credit']);

    $request->session()->put('log_access_type','accounts');

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
#### FUNCTION-NO::02 ####
#########################
# Update commission limit;
# Update will happen on --: TABLE :------ account_variables.

function set_commission(Request $request){

    $acc_id = $request->session()->get('ACC_SESSION_ID');
    
    # validating data from form.
    $request->validate([

        'commission'=>'required'

    ]);

    # Getting data from form.
    $data=array(

        'Commission'=>$request->input('commission'),
        'Updater'=>$acc_id,
        'Update_Date'=>$request->session()->get('DATE_TODAY')

    );

    DB::table('account_variables')->update($data);

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/accounts/home/');

}

# End of function set_commission.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::03 ####
#########################
# Update vat limit;
# Update will happen on --: TABLE :------ account_variables.

function set_vat(Request $request){

    $acc_id = $request->session()->get('ACC_SESSION_ID');
    
    # validating data from form.
    $request->validate([

        'vat'=>'required'

    ]);

    # Getting data from form.
    $data=array(

        'Vat'=>$request->input('vat'),
        'Updater'=>$acc_id,
        'Update_Date'=>$request->session()->get('DATE_TODAY')

    );

    DB::table('account_variables')->update($data);

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/accounts/home/');

}

# End of function set_vat.                                  <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #set_var




#########################
### FUNCTION-NO::03.5 ###
#########################
# Update vat limit;
# Update will happen on --: TABLE :------ account_variables.

function set_var(Request $request, $hook){

    $acc_id = $request->session()->get('ACC_SESSION_ID');
    
    # validating data from form.
    $request->validate([

        'value'=>'required'

    ]);

    # Getting data from form.
    $data=array(

        $hook=>$request->input('value'),
        'Updater'=>$acc_id,
        'Update_Date'=>$request->session()->get('DATE_TODAY')

    );

    DB::table('account_variables')->update($data);

    # Redirecting to [FUNCTION-NO::01].
    return redirect('/accounts/home/');

}

# End of function set_vat.                                  <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Sets up required items before loading account home page;
# Stored data in 1 sessions.

function show_all_doctors(Request $request){

    $available_doctor_data['result']=DB::table('doctors')->orderBy('Dr_Name','asc')->get();

    $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();

    session(['doctor_salary_filter_type' => 'All']);

    # Returning to the view below.
    return view('hospital/accounts/doctor_income',$available_doctor_data,$available_doctor_department);

}

# End of function show_all_doctors.                         <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
#########################
# Filters doctor income log;
# Stored data in 1 sessions.

function filter_doctor_income(Request $request){

    $doctor_search_info = $request->input('doctor_search_info');
    $department = $request->input('department');

    if($department=="All" && !empty($doctor_search_info)){

        $available_doctor_data['result']=DB::table('doctors')
            ->where('D_ID',$doctor_search_info)
            ->orwhere('Dr_Name','like','%'.$doctor_search_info.'%')
            ->orderBy('Dr_Name','asc')
            ->get();

    }if($department=="All" && empty($doctor_search_info)){

        $available_doctor_data['result']=DB::table('doctors')
            ->orderBy('Dr_Name','asc')
            ->get();

    }if($department!="All" && empty($doctor_search_info)){

        $available_doctor_data['result']=DB::table('doctors')
            ->where('Department',$department)
            ->orderBy('Dr_Name','asc')
            ->get();

    }if($department!="All" && !empty($doctor_search_info)){

        $available_doctor_data['result']=DB::table('doctors')
            ->where('Department',$department)
            ->orwhere('D_ID',$doctor_search_info)
            ->orwhere('Dr_Name','like','%'.$doctor_search_info.'%')
            ->orderBy('Dr_Name','asc')
            ->get();

    }

    $available_doctor_department['department']=DB::table('doctors')
        ->select('Department')
        ->distinct()
        ->orderBy('Department','asc')
        ->get();

    session(['doctor_salary_filter_type' => $department]);

    # Returning to the view below.
    return view('hospital/accounts/doctor_income',$available_doctor_data,$available_doctor_department);

}

# End of function filter_doctor_income.                     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::06 ####
#########################
# Shows individual doctor income log;
# Stored data in 3 sessions.

function detailed_doctor_income_log(Request $request){

    $d_id = $request->input('d_id');
    $dr_name = $request->input('dr_name');

    $doctor_income['logs']=DB::table('doctor_balance_logs')
        ->where('D_ID',$d_id)
        ->orderBy('AI_ID','desc')
        ->get();

    session(['D_ID' => $d_id]);
    session(['Dr_Name' => $dr_name]);
    session(['from' => 'none']);

    # Returning to the view below.
    return view('hospital/accounts/doctor_income_details',$doctor_income);

}

# End of function detailed_doctor_income_log.               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::07 ####
#########################
# Filters individual doctor income log details;
# Stored data in 2 sessions.

function income_details_filter(Request $request){

    $d_id = $request->session()->get('D_ID');
    $dr_name = $request->session()->get('Dr_Name');
    $from = $request->input('search_from');
    $to = $request->input('search_to');

    $doctor_income['logs']=DB::table('doctor_balance_logs')
        ->where('D_ID',$d_id)
        ->whereBetween('B_Date', [$from, $to])
        ->orderBy('AI_ID','desc')
        ->get();

    session(['from' => $from]);
    session(['to' => $to]);

    # Returning to the view below.
    return view('hospital/accounts/doctor_income_details',$doctor_income);

}

# End of function income_details_filter.               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::8 ####
#########################
# Calculates individual money collection;
# Lists all receptionist's cash ins;
# Update will happen on --: TABLE :------ cash_ins.

function cash_in_list(Request $request, $date){

    # Finding active receptionists.
    $r_id=DB::table('logins')
    ->select('Emp_ID')
    ->where('logins.status','1')
    ->where('Emp_ID','like','R%')
    ->get();

    foreach ($r_id as $id) {
        
        $collection=DB::table('hospital_income_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('User_ID',$id->Emp_ID)
        ->sum('Credit');

        $deduction=DB::table('hospital_income_log')
        ->where('Time_Stamp','like',$date.'%')
        ->where('User_ID',$id->Emp_ID)
        ->sum('Debit');

        $outdoor_collection=DB::table('patient_logs')
        ->where('Time_Stamp','like',$date.'%')
        ->where('R_ID',$id->Emp_ID)
        ->sum('Final_Fee');

        $collection = $collection - $deduction;
        $collection = $collection + $outdoor_collection;

        # Check if log exists on this date.
        $check=DB::table('cash_ins')
        ->where('Cash_In_Date',$date)
        ->where('R_ID',$id->Emp_ID)
        ->first();

        if($check==null){

            # Inserting data on cash ins.
            $log=array(

            'R_ID'=>$id->Emp_ID,
            'Cash_In_Date'=>$date,
            'Cash_In_Amount'=>$collection

            );

            DB::table('cash_ins')->insert($log);

        }else{

            # Updating data on cash ins.
            $log=array(

            'Cash_In_Amount'=>$collection

            );

            DB::table('cash_ins')
            ->where('Cash_In_Date',$date)
            ->where('R_ID',$id->Emp_ID)
            ->update($log);

        }

    }

    # Get todays cash in info.
    $cash_in['log']=DB::table('cash_ins')
    ->join('receptionists', 'cash_ins.R_ID', '=', 'receptionists.R_ID')
    ->select('receptionists.R_Name', 'cash_ins.*')
    ->where('cash_ins.Cash_In_Date',$date)
    ->get();

    # Returning to the view below.
    return view('hospital/accounts/cash_in',$cash_in);

}

# End of function cash_in_list.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::9 ####
#########################
# Filters all receptionist's cash ins.

function filter_cash_in(Request $request){

    $request->validate([

        'summary_date'=>'required'

    ]);
    
    $date = $request->input('summary_date');

    # Redirecting to [FUNCTION-NO::8].
    return redirect('/accounts/cash/in/'.$date);

}

# End of function filter_cash_in.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me. 
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::10 ####
#########################
# Submits cash in;
# Update will happen on --: TABLE :------ cash_ins.

function submit_cash_in(Request $request){

    $id = $request->input('ai_id');
    $cashed = $request->input('cashed_amount');

    # Find collected.
    $collected=DB::table('cash_ins')
        ->where('AI_ID',$id)
        ->value('Cash_In_Amount');

    # Find previously cashed.
    $prev_cashed=DB::table('cash_ins')
        ->where('AI_ID',$id)
        ->value('Amount_Received');

    $cashed = $cashed + $prev_cashed;

    # Getting data from form.
    $data=array(

        'Amount_Received'=>$cashed

    );

    if($collected<$cashed){

        # Session flash message.
        $msg = 'Total cash-in can not be greater then collected amount.';
        $request->session()->flash('msg', $msg);

    }elseif($collected>$cashed){

        # Session flash message.
        $msg = 'Not fully cashed, due remains.';
        $request->session()->flash('msg', $msg);

        # Updating data on cash ins.
        DB::table('cash_ins')
            ->where('AI_ID',$id)
            ->update($data);

    }else{

        # Session flash message.
        $msg = 'Cash in successful.';
        $request->session()->flash('msg', $msg);

        # Updating data on cash ins.
        DB::table('cash_ins')
            ->where('AI_ID',$id)
            ->update($data);

    }

    $date = $request->session()->get('DATE_TODAY');

    # Redirecting to [FUNCTION-NO::8].
    return redirect('/accounts/cash/in/'.$date);

}

# End of function cash_in_list.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::11 ####
#########################
# List all types of employee wallet.
# Generate payment form;
# Stored data in 2 sessions.

function pay_salary(Request $request, $person){

    if($person == 'Doctors'){

        $available_data['result']=DB::table('doctors')
        ->join('logins', 'doctors.D_ID', '=', 'logins.Emp_ID')
        ->select('doctors.*')
        ->where('logins.status','1')
        ->orderBy('doctors.Dr_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Doctors']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Nurses'){

        $available_data['result']=DB::table('nurses')
        ->join('logins', 'nurses.N_ID', '=', 'logins.Emp_ID')
        ->select('nurses.*')
        ->where('logins.status','1')
        ->orderBy('nurses.N_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Nurses']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Receptionists'){

        $available_data['result']=DB::table('receptionists')
        ->join('logins', 'receptionists.R_ID', '=', 'logins.Emp_ID')
        ->select('receptionists.*')
        ->where('logins.status','1')
        ->orderBy('receptionists.R_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Receptionists']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Accountants'){

        $available_data['result']=DB::table('accounts')
        ->join('logins', 'accounts.Acc_ID', '=', 'logins.Emp_ID')
        ->select('accounts.*')
        ->where('logins.status','1')
        ->orderBy('accounts.Acc_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Accountants']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Others'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Log_Genre','Other Salary')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Others']);
        session(['from' => 'none']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }

}

# End of function pay_salary.                               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::12 ####
#########################
# Submits payment;
# Update will happen on --: TABLE :------ nurses;
# Update will happen on --: TABLE :------ doctors;
# Entry will happen on  --: TABLE :------ doctor_balance_logs;
# Entry will happen on  --: TABLE :------ hospital_income_log;
# Entry will happen on  --: TABLE :------ transaction_log;
# Entry will happen on  --: TABLE :------ nurse_balance_logs.

function pay_salary_submit(Request $request){

    $id = $request->input('wallet_hook');
    $amount = $request->input('amount');
    $person = $request->session()->get('pay_salary_person');

    if($amount>0){

        if($person=='Doctors'){

            # Find wallet value.
            $wallet=DB::table('doctors')
                ->where('D_ID',$id)
                ->value('Wallet');

            if($wallet<$amount){

                # Session flash message.
                $msg = 'Insufficient balance on user wallet.';
                $request->session()->flash('msg', $msg);

                # Redirecting to [FUNCTION-NO::11].
                return redirect('/accounts/pay/salary/'.$person);

            }else{

                $wallet = $wallet-$amount;

                # Getting data from form.
                $data=array(
                    'Wallet'=>$wallet
                );

                # Updating data on doctors.
                DB::table('doctors')
                ->where('D_ID',$id)
                ->update($data);

                # Log entry on doctor balance log.
                $log=array(
                    'D_ID'=>$id,
                    'B_Date'=>$request->session()->get('DATE_TODAY'),
                    'Credit'=>0,
                    'Debit'=>$amount,
                    'Commission'=>0,
                    'Income'=>0,
                    'Current_Balance'=>$wallet,
                    'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
                    'O_ID'=>0
                );

                # Insert balance log.
                DB::table('doctor_balance_logs')
                ->insert($log);

                # Generating message.
                $message='Salary paid to: '.$id.', by: '.$request->session()->get('ACC_SESSION_ID');

                # Log entry on hospital balance log.
                $hospital_income_logs=array(
                    'Message'=>$message,
                    'Debit'=>$amount,
                    'Credit'=>0,
                    'Vat'=>0,
                    'Service_Charge'=>0,
                    'Total_Income'=>0,
                    'Credit_Type'=>'Salary',
                    'Entry_Date'=>$request->session()->get('DATE_TODAY'),
                    'Entry_Time'=>date("H:i:s"),
                    'Entry_Year'=>date("Y"),
                    'User_ID'=>$request->session()->get('ACC_SESSION_ID')
                );

                # Insert hospital log.
                DB::table('hospital_income_log')
                ->insert($hospital_income_logs);

                # Generating message.
                $message2=$amount.'Tk, salary paid to: '.$id.', by: '.$request->session()->get('ACC_SESSION_ID').' on '.$request->session()->get('DATE_TODAY');

                # Log entry on transaction log.
                $transaction_log=array(
                    'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
                    'Emp_ID'=>$id,
                    'Log_Type'=>'Debit',
                    'Log_Message'=>$message2,
                    'Log_Year'=>date("Y"),
                    'Log_Amount'=>$amount,
                    'Log_Genre'=>'Doctor Salary',
                    'Log_Date'=>$request->session()->get('DATE_TODAY')
                );

                # Insert transaction log.
                DB::table('transaction_logs')
                ->insert($transaction_log);

                # Session flash message.
                $msg = 'Salary payment log Successfully updated.';
                $request->session()->flash('msg', $msg);

                # Redirecting to [FUNCTION-NO::11].
                return redirect('/accounts/pay/salary/'.$person);

            }

        }elseif($person=='Nurses'){

            # Find wallet value.
            $wallet=DB::table('nurses')
                ->where('N_ID',$id)
                ->value('Wallet');

            if($wallet<$amount){

                # Session flash message.
                $msg = 'Insufficient balance on user wallet.';
                $request->session()->flash('msg', $msg);

                # Redirecting to [FUNCTION-NO::11].
                return redirect('/accounts/pay/salary/'.$person);

            }else{

                $wallet = $wallet-$amount;

                # Getting data from form.
                $data=array(
                    'Wallet'=>$wallet
                );

                # Updating data on nurses.
                DB::table('nurses')
                ->where('N_ID',$id)
                ->update($data);

                # Log entry on nurse balance log.
                $log=array(
                    'N_ID'=>$id,
                    'B_Date'=>$request->session()->get('DATE_TODAY'),
                    'Credit'=>0,
                    'Debit'=>$amount,
                    'Current_Balance'=>$wallet,
                    'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
                    'O_ID'=>0
                );

                # Insert balance log.
                DB::table('nurse_balance_logs')
                ->insert($log);

                # Generating message.
                $message='Salary paid to: '.$id.', by: '.$request->session()->get('ACC_SESSION_ID');

                # Log entry on hospital balance log.
                $hospital_income_logs=array(
                    'Message'=>$message,
                    'Debit'=>$amount,
                    'Credit'=>0,
                    'Vat'=>0,
                    'Service_Charge'=>0,
                    'Total_Income'=>0,
                    'Credit_Type'=>'Salary',
                    'Entry_Date'=>$request->session()->get('DATE_TODAY'),
                    'Entry_Time'=>date("H:i:s"),
                    'Entry_Year'=>date("Y"),
                    'User_ID'=>$request->session()->get('ACC_SESSION_ID')
                );

                # Insert hospital log.
                DB::table('hospital_income_log')
                ->insert($hospital_income_logs);

                # Generating message.
                $message2=$amount.'Tk, salary paid to: '.$id.', by: '.$request->session()->get('ACC_SESSION_ID').' on '.$request->session()->get('DATE_TODAY');

                # Log entry on transaction log.
                $transaction_log=array(
                    'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
                    'Emp_ID'=>$id,
                    'Log_Type'=>'Debit',
                    'Log_Message'=>$message2,
                    'Log_Year'=>date("Y"),
                    'Log_Amount'=>$amount,
                    'Log_Genre'=>'Nurse Salary',
                    'Log_Date'=>$request->session()->get('DATE_TODAY')
                );

                # Insert transaction log.
                DB::table('transaction_logs')
                ->insert($transaction_log);

                # Session flash message.
                $msg = 'Salary payment log Successfully updated';
                $request->session()->flash('msg', $msg);

                # Redirecting to [FUNCTION-NO::11].
                return redirect('/accounts/pay/salary/'.$person);

            }

        }elseif($person=='Receptionists' || $person=='Accountants'){

            if($person=='Receptionists'){
                $salary_grp='Reception Salary';
            }if($person=='Accountants'){
                $salary_grp='Account Salary';
            }

            # Generating message.
            $message='Salary paid to: '.$id.', by: '.$request->session()->get('ACC_SESSION_ID');

            # Log entry on hospital balance log.
            $hospital_income_logs=array(
                'Message'=>$message,
                'Debit'=>$amount,
                'Credit'=>0,
                'Vat'=>0,
                'Service_Charge'=>0,
                'Total_Income'=>0,
                'Credit_Type'=>'Salary',
                'Entry_Date'=>$request->session()->get('DATE_TODAY'),
                'Entry_Time'=>date("H:i:s"),
                'Entry_Year'=>date("Y"),
                'User_ID'=>$request->session()->get('ACC_SESSION_ID')
            );

            # Insert hospital log.
            DB::table('hospital_income_log')
            ->insert($hospital_income_logs);

            # Generating message.
            $message2=$amount.'Tk, salary paid to: '.$id.', by: '.$request->session()->get('ACC_SESSION_ID').' on '.$request->session()->get('DATE_TODAY');

            # Log entry on transaction log.
            $transaction_log=array(
                'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
                'Emp_ID'=>$id,
                'Log_Type'=>'Debit',
                'Log_Message'=>$message2,
                'Log_Year'=>date("Y"),
                'Log_Amount'=>$amount,
                'Log_Genre'=>$salary_grp,
                'Log_Date'=>$request->session()->get('DATE_TODAY')
            );

            # Insert transaction log.
            DB::table('transaction_logs')
            ->insert($transaction_log);

            # Session flash message.
            $msg = 'Salary payment log Successfully updated';
            $request->session()->flash('msg', $msg);

            # Redirecting to [FUNCTION-NO::11].
            return redirect('/accounts/pay/salary/'.$person);

        }elseif($person=='Others'){

            $name = $request->input('name');

            # Generating message.
            $message='Salary paid to: '.$name.', by: '.$request->session()->get('ACC_SESSION_ID');

            # Log entry on hospital balance log.
            $hospital_income_logs=array(
                'Message'=>$message,
                'Debit'=>$amount,
                'Credit'=>0,
                'Vat'=>0,
                'Service_Charge'=>0,
                'Total_Income'=>0,
                'Credit_Type'=>'Salary',
                'Entry_Date'=>$request->session()->get('DATE_TODAY'),
                'Entry_Time'=>date("H:i:s"),
                'Entry_Year'=>date("Y"),
                'User_ID'=>$request->session()->get('ACC_SESSION_ID')
            );

            # Insert hospital log.
            DB::table('hospital_income_log')
            ->insert($hospital_income_logs);

            # Generating message.
            $message2=$amount.'Tk, salary paid to: '.$name.', by: '.$request->session()->get('ACC_SESSION_ID').' on '.$request->session()->get('DATE_TODAY');

            # Log entry on transaction log.
            $transaction_log=array(
                'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
                'Emp_ID'=>$name,
                'Log_Type'=>'Debit',
                'Log_Message'=>$message2,
                'Log_Year'=>date("Y"),
                'Log_Amount'=>$amount,
                'Log_Genre'=>'Other Salary',
                'Log_Date'=>$request->session()->get('DATE_TODAY')
            );

            # Insert transaction log.
            DB::table('transaction_logs')
            ->insert($transaction_log);

            # Session flash message.
            $msg = 'Salary payment log Successfully updated';
            $request->session()->flash('msg', $msg);

            # Redirecting to [FUNCTION-NO::11].
            return redirect('/accounts/pay/salary/'.$person);

        }

    }else{

        # Session flash message.
        $msg = 'Entry must be greater then 0.';
        $request->session()->flash('msg', $msg);

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/accounts/pay/salary/'.$person);

    }

    /*# Find previously cashed.
    $prev_cashed=DB::table('cash_ins')
        ->where('AI_ID',$id)
        ->value('Amount_Received');

    $cashed = $cashed + $prev_cashed;

    # Getting data from form.
    $data=array(

        'Amount_Received'=>$cashed

    );

    if($collected<$cashed){

        # Session flash message.
        $msg = 'Total cash-in can not be greater then collected amount.';
        $request->session()->flash('msg', $msg);

    }elseif($collected>$cashed){

        # Session flash message.
        $msg = 'Not fully cashed, due remains.';
        $request->session()->flash('msg', $msg);

        # Updating data on cash ins.
        DB::table('cash_ins')
            ->where('AI_ID',$id)
            ->update($data);

    }else{

        # Session flash message.
        $msg = 'Cash in successful.';
        $request->session()->flash('msg', $msg);

        # Updating data on cash ins.
        DB::table('cash_ins')
            ->where('AI_ID',$id)
            ->update($data);

    }

    $date = $request->session()->get('DATE_TODAY');

    # Redirecting to [FUNCTION-NO::8].
    return redirect('/accounts/cash/in/'.$date);*/

}

# End of function pay_salary_submit.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::13 ####
#########################
# List all salary transaction log;
# Stored data in 5 sessions.

function salary_log(Request $request, $id){

    $total=DB::table('transaction_logs')
    ->where('Emp_ID',$id)
    ->sum('Log_Amount');

    session(['Salary_log_of_Emp_ID' => $id]);

    $person = $request->session()->get('pay_salary_person');

    if($person=='Doctors'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Doctor Salary')
        ->get();

        $emp_data=DB::table('doctors')
        ->where('D_ID',$id)
        ->first();

        $emp_name = $emp_data->Dr_Name;

    }if($person=='Nurses'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Nurse Salary')
        ->get();

        $emp_data=DB::table('nurses')
        ->where('N_ID',$id)
        ->first();

        $emp_name = $emp_data->N_Name;

    }if($person=='Receptionists'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Reception Salary')
        ->get();

        $emp_data=DB::table('receptionists')
        ->where('R_ID',$id)
        ->first();

        $emp_name = $emp_data->R_Name;

    }if($person=='Accountants'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Account Salary')
        ->get();

        $emp_data=DB::table('accounts')
        ->where('Acc_ID',$id)
        ->first();

        $emp_name = $emp_data->Acc_Name;

    }if($person=='Others'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Log_Genre','Other Salary')
        ->get();

        session(['Salary_log_of_Emp_ID' => 'null']);

    }

    session(['Salary_log_of_Emp_Name' => $emp_name]);
    session(['Salary_Lifetime' => $total]);
    session(['from' => 'none']);

    # Returning to the view below.
    return view('hospital/accounts/salary_log',$available_data);

}

# End of function salary_log.                               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::14 ####
#########################
# Filters salary page;
# Stored data in 2 sessions.

function pay_salary_search(Request $request){

    $person = $request->input('type');
    $employee_search_info = $request->input('employee_search_info');
    
    if($employee_search_info==null){

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/accounts/pay/salary/'.$person);

    }elseif($person == 'Doctors' && $employee_search_info!=null){

        $available_data['result']=DB::table('doctors')
        ->join('logins', 'doctors.D_ID', '=', 'logins.Emp_ID')
        ->select('doctors.*')
        ->where('logins.status','1')
        ->where('doctors.D_ID',$employee_search_info)
        ->orwhere('doctors.Dr_Name','like','%'.$employee_search_info.'%')
        ->orderBy('doctors.Dr_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Doctors']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Nurses' && $employee_search_info!=null){

        $available_data['result']=DB::table('nurses')
        ->join('logins', 'nurses.N_ID', '=', 'logins.Emp_ID')
        ->select('nurses.*')
        ->where('logins.status','1')
        ->where('nurses.N_ID',$employee_search_info)
        ->orwhere('nurses.N_Name','like','%'.$employee_search_info.'%')
        ->orderBy('nurses.N_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Nurses']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Receptionists' && $employee_search_info!=null){

        $available_data['result']=DB::table('receptionists')
        ->join('logins', 'receptionists.R_ID', '=', 'logins.Emp_ID')
        ->select('receptionists.*')
        ->where('logins.status','1')
        ->where('receptionists.R_ID',$employee_search_info)
        ->orwhere('receptionists.R_Name','like','%'.$employee_search_info.'%')
        ->orderBy('receptionists.R_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Receptionists']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Accountants' && $employee_search_info!=null){

        $available_data['result']=DB::table('accounts')
        ->join('logins', 'accounts.Acc_ID', '=', 'logins.Emp_ID')
        ->select('accounts.*')
        ->where('logins.status','1')
        ->where('accounts.Acc_ID',$employee_search_info)
        ->orwhere('accounts.Acc_Name','like','%'.$employee_search_info.'%')
        ->orderBy('accounts.Acc_Name','asc')
        ->get();

        session(['doctor_salary_filter_type' => 'All']);
        session(['pay_salary_person' => 'Accountants']);

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }elseif($person == 'Others' && $employee_search_info!=null){

        # Redirecting to [FUNCTION-NO::11].
        return redirect('/accounts/pay/salary/'.$person);

    }

}

# End of function pay_salary_search.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::15 ####
#########################
# Filters individual salary transaction log;
# Stored data in 5 sessions.

function filter_individual_log(Request $request, $id){

    $from = $request->input('search_from');
    $to = $request->input('search_to');
    session(['from' => $from]);
    session(['to' => $to]);

    $total=DB::table('transaction_logs')
    ->where('Emp_ID',$id)
    ->whereBetween('Log_Date', [$from, $to])
    ->sum('Log_Amount');

    $person = $request->session()->get('pay_salary_person');

    if($person=='Doctors'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Doctor Salary')
        ->whereBetween('Log_Date', [$from, $to])
        ->get();

        $emp_data=DB::table('doctors')
        ->where('D_ID',$id)
        ->first();

        $emp_name = $emp_data->Dr_Name;

    }if($person=='Nurses'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Nurse Salary')
        ->whereBetween('Log_Date', [$from, $to])
        ->get();

        $emp_data=DB::table('nurses')
        ->where('N_ID',$id)
        ->first();

        $emp_name = $emp_data->N_Name;

    }if($person=='Receptionists'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Reception Salary')
        ->whereBetween('Log_Date', [$from, $to])
        ->get();

        $emp_data=DB::table('receptionists')
        ->where('R_ID',$id)
        ->first();

        $emp_name = $emp_data->R_Name;

    }if($person=='Accountants'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Emp_ID',$id)
        ->where('Log_Genre','Account Salary')
        ->whereBetween('Log_Date', [$from, $to])
        ->get();

        $emp_data=DB::table('accounts')
        ->where('Acc_ID',$id)
        ->first();

        $emp_name = $emp_data->Acc_Name;

    }if($person=='Others'){

        $available_data['result']=DB::table('transaction_logs')
        ->where('Log_Genre','Other Salary')
        ->whereBetween('Log_Date', [$from, $to])
        ->get();

        # Returning to the view below.
        return view('hospital/accounts/pay_salary',$available_data);

    }if($person!='Others'){

        session(['Salary_log_of_Emp_ID' => $id]);
        session(['Salary_log_of_Emp_Name' => $emp_name]);
        session(['Salary_Lifetime' => $total]);

    }

    # Returning to the view below.
    return view('hospital/accounts/salary_log',$available_data);

}

# End of function filter_individual_log.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::16 ####
#########################
# Shows all uncredited creditors.

function show_creditors(Request $request){

    $available_data1['result1']=DB::table('bed_invigilators')
        ->where('Creditor_Status','1')
        ->get();

    $available_data2['result2']=DB::table('ot_assistant_logs')
        ->where('Creditor_Status','1')
        ->get();

    # Returning to the view below.
    return view('hospital/accounts/creditors',$available_data1,$available_data2);

}

# End of function show_creditors.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::17 ####
#########################
# Pays uncredited creditor;
# Update might happen on --: TABLE :------ bed_invigilators.
# Update might happen on --: TABLE :------ ot_assistant_logs.

function pay_creditors(Request $request){

    $ai_id = $request->input('ai_id');
    $payed_amount = $request->input('payed_amount');
    $table = $request->input('table');
    $name = $request->input('name');

    # Generating message.
    $message2=$payed_amount.'Tk, salary paid to: '.$name.', by: '.$request->session()->get('ACC_SESSION_ID').' on '.$request->session()->get('DATE_TODAY');

    # Log entry on transaction log.
    $transaction_log=array(
        'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
        'Emp_ID'=>$name,
        'Log_Type'=>'Debit',
        'Log_Message'=>$message2,
        'Log_Year'=>date("Y"),
        'Log_Amount'=>$payed_amount,
        'Log_Genre'=>'Creditor',
        'Log_Date'=>$request->session()->get('DATE_TODAY')
    );

    $owns=DB::table($table)
        ->where('AI_ID',$ai_id)
        ->value('Assistant_Fee');

    if($payed_amount<=0){

        # Session flash message.
        $msg = 'Invalid amount.';
        $request->session()->flash('msg', $msg);
    
    }elseif($owns>=$payed_amount){

        $previously_payed_amount=DB::table($table)
        ->where('AI_ID',$ai_id)
        ->value('Debt_Payed');

        $payed_amount=$payed_amount+$previously_payed_amount;

        # Updating owned amount.
        if($owns>0){

            $log=array(

                'Debt_Payed'=>$payed_amount
    
            );

        }else{

            $log=array(

                'Debt_Payed'=>$payed_amount,
                'Creditor_Status'=>'0'
    
            );

        }

        DB::table($table)
            ->where('AI_ID',$ai_id)
            ->update($log);
        
        # Insert transaction log.
        DB::table('transaction_logs')
            ->insert($transaction_log);

        # Session flash message.
        $msg = 'Successfully paid creditors.';
        $request->session()->flash('msg', $msg);

    }elseif($owns<$payed_amount){

        # Session flash message.
        $msg = 'Sorry, you are trying to overpay.';
        $request->session()->flash('msg', $msg);

    }

    # Redirecting to [FUNCTION-NO::16].
    return redirect('/accounts/creditors/');

}

# End of function pay_creditors.                           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::18 ####
#########################
# List all salary transaction log;
# Stored data in 1 sessions.

function creditor_log(Request $request){

    $available_data['result']=DB::table('transaction_logs')
        ->where('Log_Genre','Creditor')
        ->get();

    session(['from' => 'none']);

    # Returning to the view below.
    return view('hospital/accounts/creditors_log',$available_data);

}

# End of function creditor_log.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::19 ####
#########################
# Filter salary transaction log;
# Stored data in 2 sessions.

function creditor_log_filter(Request $request){

    $from = $request->input('search_from');
    $to = $request->input('search_to');
    session(['from' => $from]);
    session(['to' => $to]);

    $available_data['result']=DB::table('transaction_logs')
        ->where('Log_Genre','Creditor')
        ->whereBetween('Log_Date', [$from, $to])
        ->get();

    # Returning to the view below.
    return view('hospital/accounts/creditors_log',$available_data);

}

# End of function creditor_log_filter.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::20 ####
#########################
# List all admitted patients.

function show_all_admitted(Request $request){

    $available_data['result']=DB::table('admission_logs')
        ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
        ->select('patients.Patient_Name','patients.P_ID', 'patients.Cell_Number', 'admission_logs.Admission_Date', 'admission_logs.A_ID', 'admission_logs.Payment_Confirmation')
        ->where('admission_logs.Payment_Confirmation',null)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    # Returning to the view below.
    return view('hospital/accounts/admitted_list',$available_data);

}

# End of function show_all_admitted.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::21 ####
#########################
# Search all admitted patients.

function search_admitted(Request $request){

    $search_key = $request->input('search_key');

    $available_data['result']=DB::table('admission_logs')
        ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
        ->where('patients.P_ID','like','%'.$search_key.'%')
        ->orwhere('patients.Cell_Number','like','%'.$search_key.'%')
        ->select('patients.Patient_Name','patients.P_ID', 'patients.Cell_Number', 'admission_logs.Admission_Date', 'admission_logs.A_ID')
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

    # Returning to the view below.
    return view('hospital/accounts/admitted_list',$available_data);

}

# End of function search_admitted.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::22 ####
#########################
# Show all data of selected admitted patients.

function release_patient_details(Request $request, $a_id){

    date_default_timezone_set('Asia/Dhaka');
    session(['a_id' => $a_id]);

    # getting log data.
    $log_data=DB::table('admission_logs')
        ->where('A_ID', $a_id)
        ->first();

    # data collection.
    $b_id = $log_data->B_ID;
    $p_id = $log_data->P_ID;
    $d_id = $log_data->D_ID;

    $packages = $log_data->Package_Confirmation;
    $ligation = $log_data->Ligation;
    $third_seizure = $log_data->Third_Seizure;
    $update_date = $log_data->Update_Date;
    $admission_date = $log_data->Admission_Date;

    $ward_day = $log_data->Ward_Days;
    $cabin_day = $log_data->Cabin_Days;

    $pre_ward = $log_data->Previous_Ward;
    $pre_cabin = $log_data->Previous_Cabin;

    # session insert.
    session(['previous_credit' =>  $log_data->Admission_Fee]);

    session(['PACKAGES' => $packages]);
    session(['LIGATION' => $ligation]);
    session(['THIRD_SEIZURE' => $third_seizure]);
    session(['ADMISSION_DATE' => $admission_date]);
    session(['ADMISSION_TIMESTAMP' => $log_data->Admission_Timestamp]);

    session(['WARD_DAY' => $ward_day]);
    session(['CABIN_DAY' => $cabin_day]);

    # getting bed data.
    $bed_data=DB::table('beds')
        ->where('B_ID', $b_id)
        ->first();

    # data collection.
    $current_bed_type = $bed_data->Bed_Type;
    $current_day_range = $bed_data->Day_Range;

    $current_normal_pricing = $bed_data->Normal_Pricing;
    $current_package_pricing = $bed_data->Package_Pricing;

    # session insert.
    session(['BED_NO' => $bed_data->Bed_No]);
    session(['FLOOR_NO' => $bed_data->Floor_No]);
    session(['ROOM_NO' => $bed_data->Room_No]);

    session(['BED_TYPE' => $current_bed_type]);
    session(['QUALITY' => $bed_data->Quality]);

    # getting patient data.
    $patient_data=DB::table('patients')
        ->where('P_ID', $p_id)
        ->first();

    # session insert.
    session(['P_ID' => $patient_data->P_ID]);
    session(['PATIENT_NAME' => $patient_data->Patient_Name]);
    session(['PATIENT_GENDER' => $patient_data->Patient_Gender]);
    session(['PATIENT_AGE' => $patient_data->Patient_Name]);
    session(['PATIENT_CELL' => $patient_data->Cell_Number]);
    session(['PATIENT_NID' => $patient_data->NID]);
    session(['PATIENT_NID_TYPE' => $patient_data->NID_Type]);

    # getting doctor data.
    $doctor_data=DB::table('doctors')
        ->where('D_ID', $d_id)
        ->first();

    # session insert.
    session(['DOCTOR_NAME' => $doctor_data->Dr_Name]);



    # Finding difference of days (from admission to update).
    $discharge_date = date("Y-m-d");

    if($update_date != $admission_date){

        $datetime1 = new DateTime($update_date);
        $datetime2 = new DateTime($admission_date);
        $difference = $datetime1->diff($datetime2)->format("%a"); 
        $days_from_admission_to_update = $difference;

    }else{

        $days_from_admission_to_update = 1;

    }



    # Finding difference of days (from update to discharge).
    $discharge_date = date("Y-m-d");

    if($discharge_date != $update_date){

        $datetime1 = new DateTime($discharge_date);
        $datetime2 = new DateTime($update_date);
        $difference = $datetime1->diff($datetime2)->format("%a"); 
        $days_from_update_to_discharge = $difference;

    }else{

        $days_from_update_to_discharge = 1;

    }



    # Finding difference of days (from admission to discharge).
    $discharge_date = date("Y-m-d");

    if($discharge_date != $admission_date){

        $datetime1 = new DateTime($discharge_date);
        $datetime2 = new DateTime($admission_date);
        $difference = $datetime1->diff($datetime2)->format("%a"); 
        $days_from_admission_to_discharge = $difference;

    }else{

        $days_from_admission_to_discharge = 1;

    }



    # Calculation of bed bill.

    # If switch doesn't take place.
    if($update_date==null){

        if($packages!='none'){

            $extra_days = $days_from_admission_to_discharge-$current_day_range;
            if($extra_days<0){
                $total_bill = $current_package_pricing;
            }else{
                $total_bill = $current_package_pricing+($extra_days*$current_normal_pricing);
            }

            # Stating values and hooks to track.
            if($current_bed_type == "Ward"){
                session(['Pre_bed_type' => 'Cabin']);
                session(['Cur_bed_type' => $current_bed_type]);
                session(['WARD_DAY' => $days_from_admission_to_discharge]);
                session(['CABIN_DAY' => '0']);
                session(['Cabin_Bill' => '0']);
                session(['Ward_Bill' => $total_bill]);
            }else{
                session(['Pre_bed_type' => 'Ward']);
                session(['Cur_bed_type' => $current_bed_type]);
                session(['WARD_DAY' => '0']);
                session(['CABIN_DAY' => $days_from_admission_to_discharge]);
                session(['Ward_Bill' => '0']);
                session(['Cabin_Bill' => $total_bill]);
            }
            session(['Total_Bill' => $total_bill]);

        }else{

            $total_bill = $days_from_admission_to_discharge*$current_normal_pricing;

            # Stating values and hooks to track.
            if($current_bed_type == "Ward"){
                session(['Pre_bed_type' => 'Cabin']);
                session(['Cur_bed_type' => $current_bed_type]);
                session(['WARD_DAY' => $days_from_admission_to_discharge]);
                session(['CABIN_DAY' => '0']);
                session(['Cabin_Bill' => '0']);
                session(['Ward_Bill' => $total_bill]);
            }else{
                session(['Pre_bed_type' => 'Ward']);
                session(['Cur_bed_type' => $current_bed_type]);
                session(['WARD_DAY' => '0']);
                session(['CABIN_DAY' => $days_from_admission_to_discharge]);
                session(['Ward_Bill' => '0']);
                session(['Cabin_Bill' => $total_bill]);
            }
            session(['Total_Bill' => $total_bill]);

        }

    # If switch takes place.
    # Calculation of pre bed bill.
    }else{

        if($packages!='none'){

            # If previously was in ward.
            if($pre_ward>0){

                # getting previous bed info.
                $Pre_bed_data=DB::table('beds')
                ->where('B_ID', $pre_ward)
                ->first();

                $pre_normal_pricing = $Pre_bed_data->Normal_Pricing;
                $pre_package_pricing = $Pre_bed_data->Package_Pricing;
                $pre_day_range = $Pre_bed_data->Day_Range;

                if($pre_day_range<$ward_day){
                    $extra_days = $ward_day-$pre_day_range;
                    $pre_bill = $pre_package_pricing+($extra_days*$pre_normal_pricing);
                }else{
                    $pre_bill = $pre_package_pricing;
                }

                $pre_bed_type = "Ward";

            # If previously was in cabin.
            }else{

                # getting previous bed info.
                $Pre_bed_data=DB::table('beds')
                ->where('B_ID', $pre_cabin)
                ->first();

                $pre_normal_pricing = $Pre_bed_data->Normal_Pricing;
                $pre_package_pricing = $Pre_bed_data->Package_Pricing;
                $pre_day_range = $Pre_bed_data->Day_Range;

                if($pre_day_range<$cabin_day){
                    $extra_days = $cabin_day-$pre_day_range;
                    $pre_bill = $pre_package_pricing+($extra_days*$pre_normal_pricing);
                }else{
                    $pre_bill = $pre_package_pricing;
                }

                $pre_bed_type = "Cabin";

            }

        }else{

            if($pre_ward>0){

                # getting previous bed info.
                $Pre_bed_data=DB::table('beds')
                ->where('B_ID', $pre_ward)
                ->first();

                $pre_normal_pricing = $Pre_bed_data->Normal_Pricing;
                $pre_bill = $ward_day*$pre_normal_pricing;

                $pre_bed_type = "Ward";

            }else{

                # getting previous bed info.
                $Pre_bed_data=DB::table('beds')
                ->where('B_ID', $pre_cabin)
                ->first();

                $pre_normal_pricing = $Pre_bed_data->Normal_Pricing;
                $pre_bill = $cabin_day*$pre_normal_pricing;

                $pre_bed_type = "Cabin";

            }

        }



        # Calculation of current bed bill.
        $cur_bill = $days_from_update_to_discharge*$current_normal_pricing;

        # If currently is in ward.
        if($current_bed_type == 'Ward'){

            

        # If currently is in cabin.
        }else{

            

        }
        
    }

    # Stating values and hooks to track.
    if($update_date!=null){

            $total_bill = $pre_bill + $cur_bill;
            session(['Total_Bill' => $total_bill]);

        if($current_bed_type == $pre_bed_type && $current_bed_type == "Ward"){

            $total_ward_days = $ward_day+$days_from_update_to_discharge;
            session(['Cabin_Bill' => '0']);
            session(['Ward_Bill' => $total_bill]);
            session(['Pre_bed_type' => 'Ward']);
            session(['Cur_bed_type' => 'Ward']);
            session(['WARD_DAY' => $total_ward_days]);
            session(['CABIN_DAY' => '0']);

        }if($current_bed_type == $pre_bed_type && $current_bed_type == "Cabin"){

            $total_cabin_days = $cabin_day+$days_from_update_to_discharge;
            session(['Ward_Bill' => '0']);
            session(['Cabin_Bill' => $total_bill]);
            session(['Pre_bed_type' => 'Cabin']);
            session(['Cur_bed_type' => 'Cabin']);
            session(['WARD_DAY' => '0']);
            session(['CABIN_DAY' => $total_cabin_days]);

        }if($current_bed_type != $pre_bed_type && $current_bed_type == "Ward"){

            session(['Cabin_Bill' => $pre_bill]);
            session(['Ward_Bill' => $cur_bill]);
            session(['Pre_bed_type' => 'Cabin']);
            session(['Cur_bed_type' => 'Ward']);
            session(['WARD_DAY' => $days_from_update_to_discharge]);
            session(['CABIN_DAY' => $cabin_day]);

        }if($current_bed_type != $pre_bed_type && $current_bed_type == "Cabin"){

            session(['Ward_Bill' => $pre_bill]);
            session(['Cabin_Bill' => $cur_bill]);
            session(['Pre_bed_type' => 'Ward']);
            session(['Cur_bed_type' => 'Cabin']);
            session(['WARD_DAY' => $ward_day]);
            session(['CABIN_DAY' => $days_from_update_to_discharge]);

        }

    }




    # calculating ligation and third seizure bill (if any)

    # ligation
    if($ligation=='yes'){

        $ligation_bill=$request->session()->get('Ligation');
        session(['Ligation_Bill' => $ligation_bill]);

    }else{

        session(['Ligation_Bill' => '0']);

    }

    # third_seizure
    if($third_seizure=='yes'){

        $third_seizure_bill=$request->session()->get('Third_Seizure');
        session(['Third_Seizure_Bill' => $third_seizure_bill]);

    }else{

        session(['Third_Seizure_Bill' => '0']);

    }



    # calculating ot related bill

    # getting ot data.
    $ot_data_existence=DB::table('ot_logs')
        ->where('A_ID', $a_id)
        ->value('O_ID');

    if($ot_data_existence!=null){

        # getting ot data.
        $ot_data=DB::table('ot_logs')
            ->where('A_ID', $a_id)
            ->first();

        # data collection.
        $o_id = $ot_data->O_ID;
        $ot_total = $ot_data->Total;

        # ot included bills
        $ot_surgeon_bill=DB::table('surgeon_logs')
            ->where('O_ID', $o_id)
            ->sum('Surgeon_Income');

        $ot_anesthesiologist_bill=DB::table('anesthesiologist_logs')
            ->where('O_ID', $o_id)
            ->sum('Anesthesiologist_Income');

        $ot_nurses_bill=DB::table('ot_nurses_logs')
            ->where('O_ID', $o_id)
            ->sum('Nurse_Fee');

        $ot_assistant_bill=DB::table('ot_assistant_logs')
            ->where('O_ID', $o_id)
            ->sum('Assistant_Fee');


        # session insert.
        session(['ot_charge' => $ot_total]);
        session(['ot_surgeon_bill' => $ot_surgeon_bill]);
        session(['ot_anesthesiologist_bill' => $ot_anesthesiologist_bill]);
        session(['ot_nurses_bill' => $ot_nurses_bill]);
        session(['ot_assistant_bill' => $ot_assistant_bill]);

    }else{

        # session insert.
        session(['ot_charge' => '0']);
        session(['ot_surgeon_bill' => '0']);
        session(['ot_anesthesiologist_bill' => '0']);
        session(['ot_nurses_bill' => '0']);
        session(['ot_assistant_bill' => '0']);

    }



    # calculating other related bill

    # getting others fee.
    $b_i_others=DB::table('bed_invigilators')
    ->where('A_ID', $a_id)
    ->sum('Others_Fee');

    # getting visit fee.
    $b_i_visits=DB::table('bed_invigilators')
    ->where('A_ID', $a_id)
    ->sum('Visit_Charge');

    # session insert.
    session(['b_i_others' => $b_i_others]);
    session(['b_i_visits' => $b_i_visits]);

    # Redirecting to [FUNCTION-NO::15].
    # return redirect('/reception/ward/male');

    # Returning to the view below.
    return view('hospital/accounts/release_patient_details');

}

# End of function release_patient_details.                  <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::23 ####
#########################
# Edit data of selected admitted patients.

function edit_release_patient_details(Request $request, $a_id){

    $ward_tk_eduction = $request->input('ward_tk_eduction');
    $cabin_tk_eduction = $request->input('cabin_tk_eduction');

    $Ward_Bill = $request->input('Ward_Bill');
    $Cabin_Bill = $request->input('Cabin_Bill');

    if($ward_tk_eduction<0 || $cabin_tk_eduction<0){

        # Session flash message.
        $msg = 'Deduction impossible.';
        $request->session()->flash('msg', $msg);

        # Redirecting to [FUNCTION-NO::22].
        return redirect('/account/release/patient/details/'.$a_id);

    }else{

        if($ward_tk_eduction == 0){

            $Ward_Bill = $Ward_Bill - $ward_tk_eduction;
            session(['Ward_Bill' => $Ward_Bill]);

        }if($cabin_tk_eduction == 0){

            $Cabin_Bill = $Cabin_Bill - $cabin_tk_eduction;
            session(['Cabin_Bill' => $Cabin_Bill]);

        }if($cabin_tk_eduction >= 0 && $ward_tk_eduction >= 0){

            $Ward_Bill = $Ward_Bill - $ward_tk_eduction;
            $Cabin_Bill = $Cabin_Bill - $cabin_tk_eduction;

            session(['Ward_Bill' => $Ward_Bill]);
            session(['Cabin_Bill' => $Cabin_Bill]);

        }

    }

    # Returning to the view below.
    return view('hospital/accounts/release_patient_details');

}

# End of function edit_release_patient_details.             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #release_patient




#########################
#### FUNCTION-NO::24 ####
#########################
# Release patient;
# Entry will happen on  --: TABLE :------ hospital_income_log;
# Entry will happen on  --: TABLE :------ release_logs;
# Update will happen on --: TABLE :------ admission_logs

function release_patient(Request $request){

    $a_id = $request->input('a_id');

    $Ward_Bill = $request->input('Ward_Bill');
    $Cabin_Bill = $request->input('Cabin_Bill');
    $Ligation_Bill = $request->input('Ligation_Bill');
    $Third_Seizure_Bill = $request->input('Third_Seizure_Bill');
    $ot_charge = $request->input('ot_charge');
    $ot_surgeon_bill = $request->input('ot_surgeon_bill');
    $ot_anesthesiologist_bill = $request->input('ot_anesthesiologist_bill');
    $ot_nurses_bill = $request->input('ot_nurses_bill');
    $ot_assistant_bill = $request->input('ot_assistant_bill');
    $b_i_others = $request->input('b_i_others');
    $b_i_visits = $request->input('b_i_visits');
    $total_bill = $request->input('total_bill');

    $Ward_Days = $request->input('Ward_Days');
    $Cabin_Days = $request->input('Cabin_Days');

    $after_discount = $request->input('estimate');
    $discount = $request->input('discount');
    $received = $request->input('received');
    $change = $request->input('change');

    $Confirmation_msg = 'Total: '.$total_bill.', after discount ('.$discount.')% paid: .'.$after_discount;


    # Generating message.
    $message='Patient release and collected Bed bills: '.$Ward_Bill+$Cabin_Bill.', OT charge: '.$ot_charge.'. By: '.$request->session()->get('ACC_SESSION_ID');

    # Log entry on hospital balance log.
    $hospital_income_logs=array(
        'Message'=>$message,
        'Debit'=>0,
        'Credit'=>$Ward_Bill+$Cabin_Bill+$ot_charge,
        'Vat'=>0,
        'Service_Charge'=>0,
        'Total_Income'=>$Ward_Bill+$Cabin_Bill+$ot_charge,
        'Credit_Type'=>'Patient release',
        'Entry_Date'=>$request->session()->get('DATE_TODAY'),
        'Entry_Time'=>date("H:i:s"),
        'Entry_Year'=>date("Y"),
        'User_ID'=>$request->session()->get('ACC_SESSION_ID')
    );

    # Insert hospital log.
    DB::table('hospital_income_log')
        ->insert($hospital_income_logs);

    # Log update on admission table.
    $admission_update=array(
        'Ward_Days'=>$Ward_Days,
        'Cabin_Days'=>$Cabin_Days,
        'Payment_Confirmation'=>$Confirmation_msg,
        'Bed_Bill'=>$Ward_Bill+$Cabin_Bill,
        'Discount'=>$discount,
        'Discharge_Date'=>$request->session()->get('DATE_TODAY'),
        'Discharge_Timestamp'=>date('Y-m-d H:i:s')
    );

    # Update admission log.
    DB::table('admission_logs')
        ->where('A_ID',$a_id)
        ->update($admission_update);

    # Log entry on release log.
    $release_logs=array(
        'A_ID'=>$a_id,
        'Ward_Bill'=>$Ward_Bill,
        'Cabin_Bill'=>$Cabin_Bill,
        'Ligation_Bill'=>$Ligation_Bill,
        'Third_Seizure_Bill'=>$Third_Seizure_Bill,
        'OT_Bill'=>$ot_charge,
        'Surgeon_Bill'=>$ot_surgeon_bill,
        'Anesthesia_Bill'=>$ot_anesthesiologist_bill,
        'Nurses_Bill'=>$ot_nurses_bill,
        'Assistant_Bill'=>$ot_assistant_bill,
        'Other_Bill'=>$b_i_others,
        'Visiting_Bill'=>$b_i_visits,
        'Total_Bill'=>$total_bill,
        'Discount'=>$discount,
        'Estimate'=>$after_discount,
        'Received'=>$received,
        'Changes'=>$change
    );

    # Insert hospital log.
    DB::table('release_logs')
        ->insert($release_logs);

    # Session flash message.
    $msg = 'Patient released successfully.';
    $request->session()->flash('msg', $msg);

    # Redirecting to [FUNCTION-NO::].
    return redirect('/accounts/release/slips/');

}

# End of function release_patient.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::25 ####
#########################
# Submits ambulance log;
# Entry will happen on  --: TABLE :------ hospital_income_log;
# Entry will happen on  --: TABLE :------ transaction_log;

function ambulance_log_entry(Request $request){

    $ambulance_info = $request->input('ambulance_info');
    $transaction_label = $request->input('transaction_label');
    $amount = $request->input('amount');

    if($amount<0){

        # Session flash message.
        $msg = 'Amount is smaller then or equal to 0.';
        $request->session()->flash('msg', $msg);

        # Redirecting to [FUNCTION-NO::].
        return redirect('/accounts/ambulance/');

    }

    # Generating message.
    $message='Ambulance transaction: '.$ambulance_info.', amount: '.$amount.' by '.$request->session()->get('ACC_SESSION_ID');

    if($transaction_label == 'Credit'){

        # Log entry on hospital balance log.
        $hospital_income_logs=array(
            'Message'=>$message,
            'Debit'=>0,
            'Credit'=>$amount,
            'Vat'=>0,
            'Service_Charge'=>0,
            'Total_Income'=>$amount,
            'Credit_Type'=>'Ambulance',
            'Entry_Date'=>$request->session()->get('DATE_TODAY'),
            'Entry_Time'=>date("H:i:s"),
            'Entry_Year'=>date("Y"),
            'User_ID'=>$request->session()->get('ACC_SESSION_ID')
        );

    }if($transaction_label == 'Debit'){

        # Log entry on hospital balance log.
        $hospital_income_logs=array(
            'Message'=>$message,
            'Debit'=>$amount,
            'Credit'=>0,
            'Vat'=>0,
            'Service_Charge'=>0,
            'Total_Income'=>0,
            'Credit_Type'=>'Ambulance',
            'Entry_Date'=>$request->session()->get('DATE_TODAY'),
            'Entry_Time'=>date("H:i:s"),
            'Entry_Year'=>date("Y"),
            'User_ID'=>$request->session()->get('ACC_SESSION_ID')
        );

    }

    # Insert hospital log.
    DB::table('hospital_income_log')
        ->insert($hospital_income_logs);

    # Generating message.
    $message2=$amount.'Tk, ambulance related transaction: ('.$ambulance_info.'), by: '.$request->session()->get('ACC_SESSION_ID').' on '.$request->session()->get('DATE_TODAY');

    # Log entry on transaction log.
    $transaction_log=array(
        'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
        'Emp_ID'=>$ambulance_info,
        'Log_Type'=>$transaction_label,
        'Log_Message'=>$message2,
        'Log_Year'=>date("Y"),
        'Log_Amount'=>$amount,
        'Log_Genre'=>'Ambulance',
        'Log_Date'=>$request->session()->get('DATE_TODAY')
    );

    # Insert transaction log.
    DB::table('transaction_logs')
        ->insert($transaction_log);

    # Session flash message.
    $msg = 'Ambulance log registered.';
    $request->session()->flash('msg', $msg);

    # Redirecting to [FUNCTION-NO::].
    return redirect('/accounts/ambulance/');

}

# End of function ambulance_log_entry.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::26 ####
#########################
# Submits others log;
# Entry will happen on  --: TABLE :------ hospital_income_log;
# Entry will happen on  --: TABLE :------ transaction_log;

function other_log_entry(Request $request){

    $transaction_message = $request->input('transaction_message');
    $transaction_label = $request->input('transaction_label');
    $amount = $request->input('amount');

    if($amount<0){

        # Session flash message.
        $msg = 'Amount is smaller then or equal to 0.';
        $request->session()->flash('msg', $msg);

        # Redirecting to [FUNCTION-NO::].
        return redirect('/accounts/other/transactions');

    }

    # Generating message.
    $message='Others transaction: '.$transaction_message.', amount: '.$amount.' by '.$request->session()->get('ACC_SESSION_ID');

    if($transaction_label == 'Credit'){

        # Log entry on hospital balance log.
        $hospital_income_logs=array(
            'Message'=>$message,
            'Debit'=>0,
            'Credit'=>$amount,
            'Vat'=>0,
            'Service_Charge'=>0,
            'Total_Income'=>$amount,
            'Credit_Type'=>'Others',
            'Entry_Date'=>$request->session()->get('DATE_TODAY'),
            'Entry_Time'=>date("H:i:s"),
            'Entry_Year'=>date("Y"),
            'User_ID'=>$request->session()->get('ACC_SESSION_ID')
        );

    }if($transaction_label == 'Debit'){

        # Log entry on hospital balance log.
        $hospital_income_logs=array(
            'Message'=>$message,
            'Debit'=>$amount,
            'Credit'=>0,
            'Vat'=>0,
            'Service_Charge'=>0,
            'Total_Income'=>0,
            'Credit_Type'=>'Others',
            'Entry_Date'=>$request->session()->get('DATE_TODAY'),
            'Entry_Time'=>date("H:i:s"),
            'Entry_Year'=>date("Y"),
            'User_ID'=>$request->session()->get('ACC_SESSION_ID')
        );

    }

    # Insert hospital log.
    DB::table('hospital_income_log')
        ->insert($hospital_income_logs);

    # Generating message.
    $message2=$amount.'Tk, others transaction: ('.$transaction_message.'), by: '.$request->session()->get('ACC_SESSION_ID').' on '.$request->session()->get('DATE_TODAY');

    # Log entry on transaction log.
    $transaction_log=array(
        'Acc_ID'=>$request->session()->get('ACC_SESSION_ID'),
        'Emp_ID'=>'Others',
        'Log_Type'=>$transaction_label,
        'Log_Message'=>$message2,
        'Log_Year'=>date("Y"),
        'Log_Amount'=>$amount,
        'Log_Genre'=>'Others',
        'Log_Date'=>$request->session()->get('DATE_TODAY')
    );

    # Insert transaction log.
    DB::table('transaction_logs')
        ->insert($transaction_log);

    # Session flash message.
    $msg = 'Ambulance log registered.';
    $request->session()->flash('msg', $msg);

    # Redirecting to [FUNCTION-NO::].
    return redirect('/accounts/other/transactions');

}

# End of function other_log_entry.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::27 ####
#########################
# Browsing logs;

function log_browsing(Request $request){

    $logs_hook = $request->session()->get('logs_hook');

    if($logs_hook=='Credit' || $logs_hook=='Debit' || $logs_hook=='Total_Income'){

        $available_data['result']=DB::table('hospital_income_log')
            ->where($logs_hook,'>','0')
            ->get();

        $total_of_data=DB::table('hospital_income_log')
            ->where($logs_hook,'>','0')
            ->sum($logs_hook);

        session(['tp' => '1']);
        session(['lg' => $logs_hook]);
        session(['total_of_data' => $total_of_data]);

    }else{

        $available_data['result']=DB::table('transaction_logs')
            ->where('Log_Genre',$logs_hook)
            ->get();

        $total_of_data=DB::table('transaction_logs')
            ->where('Log_Genre',$logs_hook)
            ->sum('Log_Amount');

        session(['tp' => '2']);
        session(['total_of_data' => $total_of_data]);

    }

    // check log access type
    $log_access_type = $request->session()->get('log_access_type');

    if($log_access_type=="accounts"){

        # Returning to the view below.
        return view('hospital/accounts/logs',$available_data);

    }else{

        # Returning to the view below.
        return view('hospital/admin/logs',$available_data);

    }

}

# End of function log_browsing.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::28 ####
#########################
# Filtering logs;

function log_filtering(Request $request){

    $from = $request->input('search_from');
    $to = $request->input('search_to');
    $logs_hook = $request->input('type');
    $log_access_type = $request->session()->get('log_access_type');
    session(['logs_hook' => $logs_hook]);

    if($from==null || $to==null){

        // check log access type
        if($log_access_type=="accounts"){

            # Redirecting to [FUNCTION-NO::].
            return redirect('/accounts/log/');
    
        }else{
    
            # Redirecting to [FUNCTION-NO::].
            return redirect('/admin/log/');
    
        }

    }

    if($logs_hook=='Credit' || $logs_hook=='Debit' || $logs_hook=='Total_Income'){

        $available_data['result']=DB::table('hospital_income_log')
            ->where($logs_hook,'>','0')
            ->whereBetween('Entry_Date', [$from, $to])
            ->get();

        $total_of_data=DB::table('hospital_income_log')
            ->where($logs_hook,'>','0')
            ->whereBetween('Entry_Date', [$from, $to])
            ->sum($logs_hook);

        session(['tp' => '1']);
        session(['total_of_data' => $total_of_data]);

    }else{

        $available_data['result']=DB::table('transaction_logs')
            ->where('Log_Genre',$logs_hook)
            ->whereBetween('Log_Date', [$from, $to])
            ->get();

        $total_of_data=DB::table('transaction_logs')
            ->where('Log_Genre',$logs_hook)
            ->whereBetween('Log_Date', [$from, $to])
            ->sum('Log_Amount');

        session(['tp' => '2']);
        session(['total_of_data' => $total_of_data]);

    }

    // check log access type
    if($log_access_type=="accounts"){

        # Returning to the view below.
        return view('hospital/accounts/logs',$available_data);

    }else{

        # Returning to the view below.
        return view('hospital/admin/logs',$available_data);

    }

}

# End of function log_filtering.                            <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::29 ####
#########################
# Edit accounts profile;
# Update will happen on --: TABLE :------ accounts.

function edit_profile(Request $request){

    $acc_id = $request->session()->get('ACC_SESSION_ID');
    
    # validating data from form.
    $request->validate([

        'acc_name'=>'required',
        'acc_email'=>'required',
        'acc_phone'=>'required',
        'profile_photo'=>'image|dimensions:ratio=1/1|mimes:jpg,jpeg,png|dimensions:min_width=200,min_height=200,max_width=600,max_height=600|max:2048'

    ]);

    # Getting data from form.
    $data=array(

        'Acc_Name'=>$request->input('acc_name'),
        'Acc_Email'=>$request->input('acc_email'),
        'Acc_Phone'=>$request->input('acc_phone')
        
    );

    if($request->hasfile('profile_photo')){

        $image=$request->file('profile_photo');
        $ext=$image->extension();
        $file=$acc_id.'.'.$ext;
        $image->storeAs('/public/account_profile_pictures',$file);

        $data['Acc_Image']=$file;

    }

    

    DB::table('accounts')->where('Acc_ID',$acc_id)->update($data);
    
    $request->session()->flash('msg','Profile updated successfully.');

    # Redirecting to [FUNCTION-NO::].
    return redirect('/accounts/home/');

}

# End of function edit_profile.                             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me.
# This function might get an update in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
}
