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
# -----: TABLE :------ doctor_schedules.

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
#### FUNCTION-NO::0 ####
#########################
# Search printable patient invoices [appointments];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ patient_logs,
# -----: TABLE :------ doctor_schedules.

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
# Stores data in 18 sessions;

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



}
