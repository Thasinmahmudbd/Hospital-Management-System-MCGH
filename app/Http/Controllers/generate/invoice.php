<?php

namespace App\Http\Controllers\generate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class invoice extends Controller
{




#########################
#### FUNCTION-NO::01 ####
#########################
# Shows printable patient invoices [appointments];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ patient_logs,
# -----: TABLE :------ doctors.

function invoice_list_appointment(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);

    # Show todays patients.
    $today['today']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'patient_logs.D_ID', '=', 'doctors.D_ID')
    ->select('patient_logs.*', 'patients.Patient_Name', 'patients.Cell_Number', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department')
    ->where('patient_logs.Treatment_Status',0)
    ->where('patient_logs.Payment_Status','Paid')
    ->where('patient_logs.Ap_Date',$date)
    ->orderBy('patient_logs.AI_ID','desc')
    ->get();
    
    # Show all patients.
    $all['all']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'patient_logs.D_ID', '=', 'doctors.D_ID')
    ->select('patient_logs.*', 'patients.Patient_Name', 'patients.Cell_Number', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department')
    ->where('patient_logs.Treatment_Status',0)
    ->where('patient_logs.Payment_Status','Paid')
    ->where('patient_logs.Ap_Date', '!=', $date)
    ->orderBy('patient_logs.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','0');

    $request->session()->put('InvoiceType','appoint');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$today, $all);

}

# End of function invoice_list_appointment.                 <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::02 ####
#########################
# Shows printable patient invoices [admits];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ admission_logs,
# -----: TABLE :------ doctors,
# -----: TABLE :------ beds.

function invoice_list_admission(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);

    # Show todays patients.
    $today['today']=DB::table('admission_logs')
    ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'admission_logs.D_ID', '=', 'doctors.D_ID')
    ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
    ->select('admission_logs.*', 'patients.*', 'doctors.*', 'beds.*')
    ->where('admission_logs.Admission_Date',$date)
    ->orderBy('admission_logs.A_ID','desc')
    ->get();
    
    # Show all patients.
    $all['all']=DB::table('admission_logs')
    ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'admission_logs.D_ID', '=', 'doctors.D_ID')
    ->join('beds', 'admission_logs.B_ID', '=', 'beds.B_ID')
    ->select('admission_logs.*', 'patients.*', 'doctors.*', 'beds.*')
    ->where('admission_logs.Admission_Date', '!=', $date)
    ->orderBy('admission_logs.A_ID','desc')
    ->get();

    $request->session()->put('INVOICE','0');

    $request->session()->put('InvoiceType','admit');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$today, $all);

}

# End of function invoice_list_admission.                   <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Search printable patient invoices [appointments];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ patient_logs,
# -----: TABLE :------ doctors.

function invoice_search_appointment(Request $request){

    $request->validate([

        'old_patient_search_info'=>'required'

    ]);

    $old_patient_search_info = $request->input('old_patient_search_info');

    # Show searched patients.
    $search['result']=DB::table('patient_logs')
    ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'patient_logs.D_ID', '=', 'doctors.D_ID')
    ->select('patient_logs.*', 'patients.Patient_Name', 'patients.Cell_Number', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department')
    ->where('patient_logs.Treatment_Status',0)
    ->where('patient_logs.Payment_Status','Paid')
    ->where('patient_logs.P_ID','like',$old_patient_search_info)
    ->orwhere('patients.Cell_Number','like',$old_patient_search_info)
    ->orwhere('doctors.Dr_Name','like','%'.$old_patient_search_info.'%')
    ->orderBy('patient_logs.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','1');
    $request->session()->put('SEARCH_RESULT','1');

    if(count($search['result']) == 0){

        $request->session()->put('SEARCH_RESULT','0');

    }

    $request->session()->put('InvoiceType','appoint');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$search);

}

# End of function invoice_search_appointment.               <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #





#########################
#### FUNCTION-NO::0 ####
#########################
# Collect data for invoice;
# Stores data in 21 sessions;

function collect_appointment_invoice_data(Request $request, $p_l_ai_id){

    $id = $p_l_ai_id;
    
    # Gather data.
    $data_logs=DB::table('patient_logs')
    ->where('AI_ID',$id)
    ->first();

    $p_id = $data_logs->P_ID;
    $d_id = $data_logs->D_ID;
    
    # Store in session.
    session(['pId' => $p_id]);
    session(['apDate' => $data_logs->Ap_Date]);
    session(['apTime' => $data_logs->Ap_Time]);
    session(['dId' => $d_id]);
    session(['basicFee' => $data_logs->Basic_Fee]);
    session(['received' => $data_logs->Received]);
    session(['changes' => $data_logs->Changes]);
    session(['discount' => $data_logs->Discount]);
    session(['finalFee' => $data_logs->Final_Fee]);
    session(['token' => $data_logs->Token]);
    session(['randomCode' => $data_logs->Random_code]);
    session(['rId' => $data_logs->R_ID]);

    # Gather data.
    $data_patients=DB::table('patients')
    ->where('P_ID',$p_id)
    ->first();

    # Store in session.
    session(['pName' => $data_patients->Patient_Name]);
    session(['pGender' => $data_patients->Patient_Gender]);
    session(['pAge' => $data_patients->Patient_Age]);
    session(['cellNum' => $data_patients->Cell_Number]);
    session(['dId' => $data_patients->Patient_Name]);
    session(['nid' => $data_patients->NID]);
    session(['nidType' => $data_patients->NID_Type]);

    # Gather data.
    $data_doctors=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->first();

    # Store in session.
    session(['dName' => $data_doctors->Dr_Name]);
    session(['department' => $data_doctors->Department]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/reception/generate/appointment/invoice/');

}

# End of function collect_appointment_invoice_data.         <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This will change.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #





#########################
#### FUNCTION-NO::0 ####
#########################
# Collect data for invoice;
# Stores data in 32 sessions;

function collect_admission_invoice_data(Request $request, $a_l_ai_id){

    $id = $a_l_ai_id;
    
    # Gather data.
    $data_logs=DB::table('admission_logs')
    ->where('A_ID',$id)
    ->first();

    $b_id = $data_logs->B_ID;
    $p_id = $data_logs->P_ID;
    
    # Store in session.
    session(['pId' => $p_id]);
    session(['rId' => $data_logs->R_ID]);
    session(['dId' => $data_logs->D_ID]);
    session(['pre_vill' => $data_logs->Pre_Vill]);
    session(['pre_po' => $data_logs->Pre_PO]);
    session(['pre_upa' => $data_logs->Pre_Upa]);
    session(['pre_dist' => $data_logs->Pre_Dist]);
    session(['per_vill' => $data_logs->Per_Vill]);
    session(['per_po' => $data_logs->Per_PO]);
    session(['per_upa' => $data_logs->Per_Upa]);
    session(['per_dist' => $data_logs->Per_Dist]);
    session(['admission_date' => $data_logs->Admission_Date]);
    session(['religion' => $data_logs->Religion]);
    session(['consultant' => $data_logs->Consultant]);
    session(['rel_address' => $data_logs->Emergency_Rel_Add]);
    session(['rel_num' => $data_logs->Emergency_Number]);
    session(['package_confirmation' => $data_logs->Package_Confirmation]);
    session(['ligation' => $data_logs->Ligation]);
    session(['third_seizure' => $data_logs->Third_Seizure]);
    session(['admission_fee' => $data_logs->Admission_Fee]);
    session(['paid_amount' => $data_logs->Paid_Amount]);
    session(['changes' => $data_logs->Changes]);
    session(['admission_timestamp' => $data_logs->Admission_Timestamp]);

    # Gather data.
    $data_patients=DB::table('patients')
    ->where('P_ID',$p_id)
    ->first();

    # Store in session.
    session(['pName' => $data_patients->Patient_Name]);
    session(['pGender' => $data_patients->Patient_Gender]);
    session(['cellNum' => $data_patients->Cell_Number]);
    session(['dId' => $data_patients->Patient_Name]);
    session(['nid' => $data_patients->NID]);
    session(['nidType' => $data_patients->NID_Type]);
    session(['pAge' => $data_patients->Patient_Age]);

    # Gather data.
    $data_beds=DB::table('beds')
    ->where('B_ID',$b_id)
    ->first();

    # Store in session.
    session(['bed_no' => $data_beds->Bed_No]);
    session(['floor_no' => $data_beds->Floor_No]);
    session(['room_no' => $data_beds->Room_No]);
    session(['bed_type' => $data_beds->Bed_Type]);
    session(['quality' => $data_beds->Quality]);
    session(['b_location' => $data_beds->B_Location]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/reception/generate/admit/invoice/');

}

# End of function collect_admission_invoice_data.           <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This will change.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Shows printable patient invoices [ot bill];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ ot_logs,
# -----: TABLE :------ patients,
# -----: TABLE :------ admission_ogs.
# -----: TABLE :------ doctors.

function invoice_list_ot(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);
    
    # Show all bills.
    $all['all']=DB::table('ot_logs')
    ->join('patients', 'ot_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'ot_logs.D_ID', '=', 'doctors.D_ID')
    ->join('admission_logs', 'ot_logs.A_ID', '=', 'admission_logs.A_ID')
    ->select('patients.Patient_Name', 'patients.Cell_Number', 'patients.P_ID', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department', 'ot_logs.O_ID', 'ot_logs.O_Type')
    ->where('admission_logs.OT_Confirmation',1)
    ->where('admission_logs.Payment_Confirmation',null)
    ->orderBy('ot_logs.O_ID','desc')
    ->get();

    $request->session()->put('INVOICE','0');

    # Returning to the view below.
    return view('hospital/ot/invoice_generator_list_ot_bill', $all);

}

# End of function invoice_list_ot.                          <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #





#########################
#### FUNCTION-NO::0 ####
#########################
# Collect data for invoice;
# Stores data in 10 sessions.

function collect_ot_bill_invoice_data(Request $request, $o_id){

    # Gather data.
    $data_ot_logs=DB::table('ot_logs')
    ->where('O_ID',$o_id)
    ->first();

    $p_id = $data_ot_logs->P_ID;
    $a_id = $data_ot_logs->A_ID;

    # Gather data.
    $data_admission_logs=DB::table('admission_logs')
    ->where('A_ID',$a_id)
    ->first();

    $b_id = $data_admission_logs->B_ID;

    # Gather data.
    $data_bed_logs=DB::table('beds')
    ->where('B_ID',$b_id)
    ->first();

    # Gather data.
    $data_patients=DB::table('patients')
    ->where('P_ID',$p_id)
    ->first();

    # Store in session.
    session(['oId' => $o_id]);
    session(['pId' => $p_id]);
    session(['pName' => $data_patients->Patient_Name]);

    session(['bed_no' => $data_bed_logs->Bed_No]);

    session(['o_type' => $data_ot_logs->O_Type]);
    session(['o_duration' => $data_ot_logs->O_Duration]);
    session(['o_time' => $data_ot_logs->O_Time]);
    session(['o_data' => $data_ot_logs->O_Date]);
    session(['o_charge_income' => $data_ot_logs->OT_Charge_Income]);
    session(['other_charges' => $data_ot_logs->Others_Charges]);

    session(['a_type' => $data_ot_logs->Anesthesia_Type]);

    session(['ot_timestamp' => $data_ot_logs->Timestamp]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/ot/generate/bill/invoice/');

}

# End of function collect_ot_bill_invoice_data.             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This will change.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
















}
