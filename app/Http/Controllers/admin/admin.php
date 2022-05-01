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
    $year = date("Y");

    $timestamp = strtotime($date);
    $day = date('D', $timestamp);

    $request->session()->put('DATE_TODAY',$date);
    $request->session()->put('DAY_TODAY',$day);

    $request->session()->put('log_access_type','admin');

    ################################################################################
    ################################################################################

    # Doctor count
    $doctor_active=DB::table('logins')
        ->where('Emp_ID','like','D_'.'%')
        ->where('status','1')
        ->count('Emp_ID');

    $request->session()->put('doctor_active',$doctor_active);

    $doctor_inactive=DB::table('logins')
        ->where('Emp_ID','like','D_'.'%')
        ->where('status','0')
        ->count('Emp_ID');

    $request->session()->put('doctor_inactive',$doctor_inactive);

    # Nurse count
    $nurse_active=DB::table('logins')
        ->where('Emp_ID','like','N_'.'%')
        ->where('status','1')
        ->count('Emp_ID');

    $request->session()->put('nurse_active',$nurse_active);

    $nurse_inactive=DB::table('logins')
        ->where('Emp_ID','like','N_'.'%')
        ->where('status','0')
        ->count('Emp_ID');

    $request->session()->put('nurse_inactive',$nurse_inactive);

    # Accounts count
    $accounts_active=DB::table('logins')
        ->where('Emp_ID','like','AC_'.'%')
        ->where('status','1')
        ->count('Emp_ID');

    $request->session()->put('accounts_active',$accounts_active);

    $accounts_inactive=DB::table('logins')
        ->where('Emp_ID','like','AC_'.'%')
        ->where('status','0')
        ->count('Emp_ID');

    $request->session()->put('accounts_inactive',$accounts_inactive);

    # OT count
    $ot_active=DB::table('logins')
        ->where('Emp_ID','like','OT_'.'%')
        ->where('status','1')
        ->count('Emp_ID');

    $request->session()->put('ot_active',$ot_active);

    $ot_inactive=DB::table('logins')
        ->where('Emp_ID','like','OT_'.'%')
        ->where('status','0')
        ->count('Emp_ID');

    $request->session()->put('ot_inactive',$ot_inactive);

    ################################################################################
    ################################################################################

    # Male ward count
    $male_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Male')
        ->count('B_ID');

    $request->session()->put('male_ward',$male_ward);

    $occ_male_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Male')
        ->where('Confirmation','1')
        ->count('B_ID');

    $request->session()->put('occ_male_ward',$occ_male_ward);

    # Female ward count
    $female_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Female')
        ->count('B_ID');

    $request->session()->put('female_ward',$female_ward);

    $occ_female_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Female')
        ->where('Confirmation','1')
        ->count('B_ID');

    $request->session()->put('occ_female_ward',$occ_female_ward);

    # Child ward count
    $child_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Child')
        ->count('B_ID');

    $request->session()->put('child_ward',$child_ward);

    $occ_child_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Child')
        ->where('Confirmation','1')
        ->count('B_ID');

    $request->session()->put('occ_child_ward',$occ_child_ward);

    # Maternity ward count
    $maternity_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Maternity')
        ->count('B_ID');

    $request->session()->put('maternity_ward',$maternity_ward);

    $occ_maternity_ward=DB::table('beds')
        ->where('Bed_Type','Ward')
        ->where('Quality','Maternity')
        ->where('Confirmation','1')
        ->count('B_ID');

    $request->session()->put('occ_maternity_ward',$occ_maternity_ward);

    ################################################################################
    ################################################################################

    # Normal cabin count
    $normal_cabin=DB::table('beds')
        ->where('Bed_Type','Cabin')
        ->where('Quality','Normal')
        ->count('B_ID');

    $request->session()->put('normal_cabin',$normal_cabin);

    $occ_normal_cabin=DB::table('beds')
        ->where('Bed_Type','Cabin')
        ->where('Quality','Normal')
        ->where('Confirmation','1')
        ->count('B_ID');

    $request->session()->put('occ_normal_cabin',$occ_normal_cabin);

    # AC cabin count
    $ac_cabin=DB::table('beds')
        ->where('Bed_Type','Cabin')
        ->where('Quality','AC')
        ->count('B_ID');

    $request->session()->put('ac_cabin',$ac_cabin);

    $occ_ac_cabin=DB::table('beds')
        ->where('Bed_Type','Cabin')
        ->where('Quality','AC')
        ->where('Confirmation','1')
        ->count('B_ID');

    $request->session()->put('occ_ac_cabin',$occ_ac_cabin);

    # Double AC cabin count
    $double_ac_cabin=DB::table('beds')
        ->where('Bed_Type','Cabin')
        ->where('Quality','Double AC')
        ->count('B_ID');

    $request->session()->put('double_ac_cabin',$double_ac_cabin);

    $occ_double_ac_cabin=DB::table('beds')
        ->where('Bed_Type','Cabin')
        ->where('Quality','Double AC')
        ->where('Confirmation','1')
        ->count('B_ID');

    $request->session()->put('occ_double_ac_cabin',$occ_double_ac_cabin);

    ################################################################################
    ################################################################################

    # Credit yearly
    $credit_yearly=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $request->session()->put('credit_yearly',$credit_yearly);

    # Credit Jan
    $credit_jan=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-01-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_jan_per = ($credit_jan*100)/$credit_yearly;
    $credit_jan_per_10 = (($credit_jan_per*10)/100)%10;

    $request->session()->put('credit_jan',$credit_jan);
    $request->session()->put('credit_jan_per',$credit_jan_per);
    $request->session()->put('credit_jan_per_10',$credit_jan_per_10);

    # Credit Feb
    $credit_feb=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-02-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_feb_per = ($credit_feb*100)/$credit_yearly;
    $credit_feb_per_10 = (($credit_feb_per*10)/100)%10;

    $request->session()->put('credit_feb',$credit_feb);
    $request->session()->put('credit_feb_per',$credit_feb_per);
    $request->session()->put('credit_feb_per_10',$credit_feb_per_10);

    # Credit Mar
    $credit_mar=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-03-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_mar_per = ($credit_mar*100)/$credit_yearly;
    $credit_mar_per_10 = (($credit_mar_per*10)/100)%10;

    $request->session()->put('credit_mar',$credit_mar);
    $request->session()->put('credit_mar_per',$credit_mar_per);
    $request->session()->put('credit_mar_per_10',$credit_mar_per_10);

    # Credit Apr
    $credit_apr=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-04-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_apr_per = ($credit_apr*100)/$credit_yearly;
    $credit_apr_per_10 = (($credit_apr_per*10)/100)%10;

    $request->session()->put('credit_apr',$credit_apr);
    $request->session()->put('credit_apr_per',$credit_apr_per);
    $request->session()->put('credit_apr_per_10',$credit_apr_per_10);

    # Credit May
    $credit_may=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-05-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_may_per = ($credit_may*100)/$credit_yearly;
    $credit_may_per_10 = (($credit_may_per*10)/100)%10;

    $request->session()->put('credit_may',$credit_may);
    $request->session()->put('credit_may_per',$credit_may_per);
    $request->session()->put('credit_may_per_10',$credit_may_per_10);

    # Credit Jun
    $credit_jun=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-06-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_jun_per = ($credit_jun*100)/$credit_yearly;
    $credit_jun_per_10 = (($credit_jun_per*10)/100)%10;

    $request->session()->put('credit_jun',$credit_jun);
    $request->session()->put('credit_jun_per',$credit_jun_per);
    $request->session()->put('credit_jun_per_10',$credit_jun_per_10);

    # Credit Jul
    $credit_jul=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-07-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_jul_per = ($credit_jul*100)/$credit_yearly;
    $credit_jul_per_10 = (($credit_jul_per*10)/100)%10;

    $request->session()->put('credit_jul',$credit_jul);
    $request->session()->put('credit_jul_per',$credit_jul_per);
    $request->session()->put('credit_jul_per_10',$credit_jul_per_10);

    # Credit Aug
    $credit_aug=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-08-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_aug_per = ($credit_aug*100)/$credit_yearly;
    $credit_aug_per_10 = (($credit_aug_per*10)/100)%10;

    $request->session()->put('credit_aug',$credit_aug);
    $request->session()->put('credit_aug_per',$credit_aug_per);
    $request->session()->put('credit_aug_per_10',$credit_aug_per_10);

    # Credit Sep
    $credit_sep=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-09-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_sep_per = ($credit_sep*100)/$credit_yearly;
    $credit_sep_per_10 = (($credit_sep_per*10)/100)%10;

    $request->session()->put('credit_sep',$credit_sep);
    $request->session()->put('credit_sep_per',$credit_sep_per);
    $request->session()->put('credit_sep_per_10',$credit_sep_per_10);

    # Credit Oct
    $credit_oct=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-10-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_oct_per = ($credit_oct*100)/$credit_yearly;
    $credit_oct_per_10 = (($credit_oct_per*10)/100)%10;

    $request->session()->put('credit_oct',$credit_oct);
    $request->session()->put('credit_oct_per',$credit_oct_per);
    $request->session()->put('credit_oct_per_10',$credit_oct_per_10);

    # Credit Nov
    $credit_nov=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-11-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_nov_per = ($credit_nov*100)/$credit_yearly;
    $credit_nov_per_10 = (($credit_nov_per*10)/100)%10;

    $request->session()->put('credit_nov',$credit_nov);
    $request->session()->put('credit_nov_per',$credit_nov_per);
    $request->session()->put('credit_nov_per_10',$credit_nov_per_10);

    # Credit Dec
    $credit_dec=DB::table('hospital_income_log')
        ->where('Credit','>','0')
        ->where('Entry_Date','like','%'.'-12-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Credit');

    $credit_dec_per = ($credit_dec*100)/$credit_yearly;
    $credit_dec_per_10 = (($credit_dec_per*10)/100)%10;

    $request->session()->put('credit_dec',$credit_dec);
    $request->session()->put('credit_dec_per',$credit_dec_per);
    $request->session()->put('credit_dec_per_10',$credit_dec_per_10);

    ################################################################################
    ################################################################################

    # Debit yearly
    $debit_yearly=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $request->session()->put('debit_yearly',$debit_yearly);

    # Debit Jan
    $debit_jan=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-01-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_jan_per = ($debit_jan*100)/$debit_yearly;
    $debit_jan_per_10 = (($debit_jan_per*10)/100)%10;

    $request->session()->put('debit_jan',$debit_jan);
    $request->session()->put('debit_jan_per',$debit_jan_per);
    $request->session()->put('debit_jan_per_10',$debit_jan_per_10);

    # Debit Feb
    $debit_feb=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-02-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_feb_per = ($debit_feb*100)/$debit_yearly;
    $debit_feb_per_10 = (($debit_feb_per*10)/100)%10;

    $request->session()->put('debit_feb',$debit_feb);
    $request->session()->put('debit_feb_per',$debit_feb_per);
    $request->session()->put('debit_feb_per_10',$debit_feb_per_10);

    # Debit Mar
    $debit_mar=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-03-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_mar_per = ($debit_mar*100)/$debit_yearly;
    $debit_mar_per_10 = (($debit_mar_per*10)/100)%10;

    $request->session()->put('debit_mar',$debit_mar);
    $request->session()->put('debit_mar_per',$debit_mar_per);
    $request->session()->put('debit_mar_per_10',$debit_mar_per_10);

    # Debit Apr
    $debit_apr=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-04-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_apr_per = ($debit_apr*100)/$debit_yearly;
    $debit_apr_per_10 = (($debit_apr_per*10)/100)%10;

    $request->session()->put('debit_apr',$debit_apr);
    $request->session()->put('debit_apr_per',$debit_apr_per);
    $request->session()->put('debit_apr_per_10',$debit_apr_per_10);

    # Debit May
    $debit_may=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-05-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_may_per = ($debit_may*100)/$debit_yearly;
    $debit_may_per_10 = (($debit_may_per*10)/100)%10;

    $request->session()->put('debit_may',$debit_may);
    $request->session()->put('debit_may_per',$debit_may_per);
    $request->session()->put('debit_may_per_10',$debit_may_per_10);

    # Debit Jun
    $debit_jun=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-06-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_jun_per = ($debit_jun*100)/$debit_yearly;
    $debit_jun_per_10 = (($debit_jun_per*10)/100)%10;

    $request->session()->put('debit_jun',$debit_jun);
    $request->session()->put('debit_jun_per',$debit_jun_per);
    $request->session()->put('debit_jun_per_10',$debit_jun_per_10);

    # Debit Jul
    $debit_jul=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-07-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_jul_per = ($debit_jul*100)/$debit_yearly;
    $debit_jul_per_10 = (($debit_jul_per*10)/100)%10;

    $request->session()->put('debit_jul',$debit_jul);
    $request->session()->put('debit_jul_per',$debit_jul_per);
    $request->session()->put('debit_jul_per_10',$debit_jul_per_10);

    # Debit Aug
    $debit_aug=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-08-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_aug_per = ($debit_aug*100)/$debit_yearly;
    $debit_aug_per_10 = (($debit_aug_per*10)/100)%10;

    $request->session()->put('debit_aug',$debit_aug);
    $request->session()->put('debit_aug_per',$debit_aug_per);
    $request->session()->put('debit_aug_per_10',$debit_aug_per_10);

    # Debit Sep
    $debit_sep=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-09-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_sep_per = ($debit_sep*100)/$debit_yearly;
    $debit_sep_per_10 = (($debit_sep_per*10)/100)%10;

    $request->session()->put('debit_sep',$debit_sep);
    $request->session()->put('debit_sep_per',$debit_sep_per);
    $request->session()->put('debit_sep_per_10',$debit_sep_per_10);

    # Debit Oct
    $debit_oct=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-10-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_oct_per = ($debit_oct*100)/$debit_yearly;
    $debit_oct_per_10 = (($debit_oct_per*10)/100)%10;

    $request->session()->put('debit_oct',$debit_oct);
    $request->session()->put('debit_oct_per',$debit_oct_per);
    $request->session()->put('debit_oct_per_10',$debit_oct_per_10);

    # Debit Nov
    $debit_nov=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-11-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_nov_per = ($debit_nov*100)/$debit_yearly;
    $debit_nov_per_10 = (($debit_nov_per*10)/100)%10;

    $request->session()->put('debit_nov',$debit_nov);
    $request->session()->put('debit_nov_per',$debit_nov_per);
    $request->session()->put('debit_nov_per_10',$debit_nov_per_10);

    # Debit Dec
    $debit_dec=DB::table('hospital_income_log')
        ->where('Debit','>','0')
        ->where('Entry_Date','like','%'.'-12-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Debit');

    $debit_dec_per = ($debit_dec*100)/$debit_yearly;
    $debit_dec_per_10 = (($debit_dec_per*10)/100)%10;

    $request->session()->put('debit_dec',$debit_dec);
    $request->session()->put('debit_dec_per',$debit_dec_per);
    $request->session()->put('debit_dec_per_10',$debit_dec_per_10);

    ################################################################################
    ################################################################################

    # Total_Income yearly
    $total_income_yearly=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $request->session()->put('total_income_yearly',$total_income_yearly);

    # Total_Income Jan
    $total_income_jan=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-01-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_jan_per = ($total_income_jan*100)/$total_income_yearly;
    $total_income_jan_per_10 = (($total_income_jan_per*10)/100)%10;

    $request->session()->put('total_income_jan',$total_income_jan);
    $request->session()->put('total_income_jan_per',$total_income_jan_per);
    $request->session()->put('total_income_jan_per_10',$total_income_jan_per_10);

    # Total_Income Feb
    $total_income_feb=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-02-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_feb_per = ($total_income_feb*100)/$total_income_yearly;
    $total_income_feb_per_10 = (($total_income_feb_per*10)/100)%10;

    $request->session()->put('total_income_feb',$total_income_feb);
    $request->session()->put('total_income_feb_per',$total_income_feb_per);
    $request->session()->put('total_income_feb_per_10',$total_income_feb_per_10);

    # Total_Income Mar
    $total_income_mar=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-03-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_mar_per = ($total_income_mar*100)/$total_income_yearly;
    $total_income_mar_per_10 = (($total_income_mar_per*10)/100)%10;

    $request->session()->put('total_income_mar',$total_income_mar);
    $request->session()->put('total_income_mar_per',$total_income_mar_per);
    $request->session()->put('total_income_mar_per_10',$total_income_mar_per_10);

    # Total_Income Apr
    $total_income_apr=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-04-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_apr_per = ($total_income_apr*100)/$total_income_yearly;
    $total_income_apr_per_10 = (($total_income_apr_per*10)/100)%10;

    $request->session()->put('total_income_apr',$total_income_apr);
    $request->session()->put('total_income_apr_per',$total_income_apr_per);
    $request->session()->put('total_income_apr_per_10',$total_income_apr_per_10);

    # Total_Income May
    $total_income_may=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-05-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_may_per = ($total_income_may*100)/$total_income_yearly;
    $total_income_may_per_10 = (($total_income_may_per*10)/100)%10;

    $request->session()->put('total_income_may',$total_income_may);
    $request->session()->put('total_income_may_per',$total_income_may_per);
    $request->session()->put('total_income_may_per_10',$total_income_may_per_10);

    # Total_Income Jun
    $total_income_jun=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-06-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_jun_per = ($total_income_jun*100)/$total_income_yearly;
    $total_income_jun_per_10 = (($total_income_jun_per*10)/100)%10;

    $request->session()->put('total_income_jun',$total_income_jun);
    $request->session()->put('total_income_jun_per',$total_income_jun_per);
    $request->session()->put('total_income_jun_per_10',$total_income_jun_per_10);

    # Total_Income Jul
    $total_income_jul=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-07-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_jul_per = ($total_income_jul*100)/$total_income_yearly;
    $total_income_jul_per_10 = (($total_income_jul_per*10)/100)%10;

    $request->session()->put('total_income_jul',$total_income_jul);
    $request->session()->put('total_income_jul_per',$total_income_jul_per);
    $request->session()->put('total_income_jul_per_10',$total_income_jul_per_10);

    # Total_Income Aug
    $total_income_aug=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-08-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_aug_per = ($total_income_aug*100)/$total_income_yearly;
    $total_income_aug_per_10 = (($total_income_aug_per*10)/100)%10;

    $request->session()->put('total_income_aug',$total_income_aug);
    $request->session()->put('total_income_aug_per',$total_income_aug_per);
    $request->session()->put('total_income_aug_per_10',$total_income_aug_per_10);

    # Total_Income Sep
    $total_income_sep=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-09-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_sep_per = ($total_income_sep*100)/$total_income_yearly;
    $total_income_sep_per_10 = (($total_income_sep_per*10)/100)%10;

    $request->session()->put('total_income_sep',$total_income_sep);
    $request->session()->put('total_income_sep_per',$total_income_sep_per);
    $request->session()->put('total_income_sep_per_10',$total_income_sep_per_10);

    # Total_Income Oct
    $total_income_oct=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-10-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_oct_per = ($total_income_oct*100)/$total_income_yearly;
    $total_income_oct_per_10 = (($total_income_oct_per*10)/100)%10;

    $request->session()->put('total_income_oct',$total_income_oct);
    $request->session()->put('total_income_oct_per',$total_income_oct_per);
    $request->session()->put('total_income_oct_per_10',$total_income_oct_per_10);

    # Total_Income Nov
    $total_income_nov=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-11-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_nov_per = ($total_income_nov*100)/$total_income_yearly;
    $total_income_nov_per_10 = (($total_income_nov_per*10)/100)%10;

    $request->session()->put('total_income_nov',$total_income_nov);
    $request->session()->put('total_income_nov_per',$total_income_nov_per);
    $request->session()->put('total_income_nov_per_10',$total_income_nov_per_10);

    # Total_Income Dec
    $total_income_dec=DB::table('hospital_income_log')
        ->where('Total_Income','>','0')
        ->where('Entry_Date','like','%'.'-12-'.'%')
        ->where('Entry_Year', $year)
        ->sum('Total_Income');

    $total_income_dec_per = ($total_income_dec*100)/$total_income_yearly;
    $total_income_dec_per_10 = (($total_income_dec_per*10)/100)%10;

    $request->session()->put('total_income_dec',$total_income_dec);
    $request->session()->put('total_income_dec_per',$total_income_dec_per);
    $request->session()->put('total_income_dec_per_10',$total_income_dec_per_10);


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
# Blocks account;
# Update will happen on --: TABLE :------ logins.

function block_account(Request $request, $emp_id){

    # Log update on admission table.
    $status=array(
        'status'=>0
    );

    # Update admission log.
    DB::table('logins')
        ->where('Emp_ID',$emp_id)
        ->update($status);

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/admin/doctor/list');

}

# End of function doctor_list_browse.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::03 ####
#########################
# Unblocks account;
# Update will happen on --: TABLE :------ logins.

function unblock_account(Request $request, $emp_id){

    # Log update on admission table.
    $status=array(
        'status'=>1
    );

    # Update admission log.
    DB::table('logins')
        ->where('Emp_ID',$emp_id)
        ->update($status);

    # Redirecting to [FUNCTION-NO::05].
    return redirect('/admin/doctor/list');

}

# End of function doctor_list_browse.                       <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Generates necessary data for employee registration.

function employee_add_form(Request $request){

    $specialty['specialty']=DB::table('doctors')
        ->select('Specialty')
        ->orderBy('Specialty','asc')
        ->distinct('Specialty')
        ->get();

    $department['department']=DB::table('doctors')
        ->select('Department')
        ->orderBy('Department','asc')
        ->distinct('Department')
        ->get();

    # Returning to the view below.
    return view('hospital/admin/add_employee', $specialty, $department);

}

# End of function employee_add_form.                        <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
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
