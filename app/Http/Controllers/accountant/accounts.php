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
# This will be updated in the future.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
#########################
# Filters doctor income log;

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
# This will be updated in the future.
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
