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
# Stored data in 8 sessions.

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

    session(['VAT' => $vat]);
    session(['COMMISSION' => $commission]);

    $rest = 100-($vat+$commission);

    session(['REST' => $rest]);

    # Date and day set up.
    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");

    $timestamp = strtotime($date);
    $day = date('D', $timestamp);

    $request->session()->put('DATE_TODAY',$date);
    $request->session()->put('DAY_TODAY',$day);

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
# update commission limit;
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
# update vat limit;
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
# Stored data in 1 sessions.

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
# Stored data in 1 sessions.

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
# Lists all receptionist's cash ins.

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
# Submits cash in.

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
#### FUNCTION-NO:: ####
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
