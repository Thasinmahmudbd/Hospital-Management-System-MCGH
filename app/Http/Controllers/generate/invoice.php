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
    ->where('admission_logs.Payment_Confirmation', null)
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
#### FUNCTION-NO::03 ####
#########################
# Shows printable patient invoices [dental];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ dental_log,
# -----: TABLE :------ doctors,

function invoice_list_dental(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);
    $one_week = date('Y-m-d', strtotime($date. ' - 7 days'));

    # Show todays patients.
    $today['today']=DB::table('dental_log')
    ->join('patients', 'dental_log.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'dental_log.D_ID', '=', 'doctors.D_ID')
    ->select('dental_log.*', 'patients.*', 'doctors.*')
    ->where('dental_log.Reg_Date',$date)
    ->orderBy('dental_log.AI_ID','desc')
    ->get();
    
    # Show all patients.
    $all['all']=DB::table('dental_log')
    ->join('patients', 'dental_log.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'dental_log.D_ID', '=', 'doctors.D_ID')
    ->select('dental_log.*', 'patients.*', 'doctors.*')
    ->where('dental_log.Reg_Date', '!=', $date)
    ->where('dental_log.Reg_Date', '>', $one_week)
    ->orderBy('dental_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','0');

    $request->session()->put('InvoiceType','dental');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$today, $all);

}

# End of function invoice_list_dental.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::04 ####
#########################
# Shows printable patient invoices [pathology];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ pathology_log,
# -----: TABLE :------ doctors,

function invoice_list_pathology(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);
    $one_week = date('Y-m-d', strtotime($date. ' - 7 days'));

    # Show todays patients.
    $today['today']=DB::table('pathology_log')
    ->join('patients', 'pathology_log.P_ID', '=', 'patients.P_ID')
    ->select('pathology_log.*', 'patients.*')
    ->where('pathology_log.Reg_Date',$date)
    ->orderBy('pathology_log.AI_ID','desc')
    ->get();
    
    # Show all patients.
    $all['all']=DB::table('pathology_log')
    ->join('patients', 'pathology_log.P_ID', '=', 'patients.P_ID')
    ->select('pathology_log.*', 'patients.*')
    ->where('pathology_log.Reg_Date', '!=', $date)
    ->where('pathology_log.Reg_Date', '>', $one_week)
    ->orderBy('pathology_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','0');

    $request->session()->put('InvoiceType','pathology');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$today, $all);

}

# End of function invoice_list_pathology.                   <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::05 ####
#########################
# Shows printable patient invoices [physio];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ pathology_log,
# -----: TABLE :------ doctors,

function invoice_list_physio(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);
    $one_week = date('Y-m-d', strtotime($date. ' - 7 days'));

    # Show todays patients.
    $today['today']=DB::table('physio_log')
    ->join('patients', 'physio_log.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'physio_log.D_ID', '=', 'doctors.D_ID')
    ->select('physio_log.*', 'patients.Patient_Name', 'patients.Patient_Gender', 'patients.Patient_Age', 'patients.Cell_Number', 'patients.P_ID', 'doctors.Dr_Name', 'doctors.D_ID')
    ->where('physio_log.Reg_Date',$date)
    ->orderBy('physio_log.AI_ID','desc')
    ->get();
    
    # Show all patients.
    $all['all']=DB::table('physio_log')
    ->join('patients', 'physio_log.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'physio_log.D_ID', '=', 'doctors.D_ID')
    ->select('physio_log.*', 'patients.Patient_Name', 'patients.Patient_Gender', 'patients.Patient_Age', 'patients.Cell_Number', 'patients.P_ID', 'doctors.Dr_Name', 'doctors.D_ID')
    ->where('physio_log.Reg_Date', '!=', $date)
    ->where('physio_log.Reg_Date', '>', $one_week)
    ->orderBy('physio_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','0');

    $request->session()->put('InvoiceType','physio');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$today, $all);

}

# End of function invoice_list_physio.                      <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me, 
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::06 ####
#########################
# Shows printable patient invoices [er];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ emergency_log,
# -----: TABLE :------ doctors,

function invoice_list_er(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);
    $one_week = date('Y-m-d', strtotime($date. ' - 7 days'));

    # Show todays patients.
    $today['today']=DB::table('emergency_log')
    ->join('doctors', 'emergency_log.D_ID', '=', 'doctors.D_ID')
    ->select('emergency_log.*', 'doctors.Dr_Name', 'doctors.D_ID')
    ->where('emergency_log.Reg_Date',$date)
    ->orderBy('emergency_log.AI_ID','desc')
    ->get();
    
    # Show all patients.
    $all['all']=DB::table('emergency_log')
    ->join('doctors', 'emergency_log.D_ID', '=', 'doctors.D_ID')
    ->select('emergency_log.*', 'doctors.Dr_Name', 'doctors.D_ID')
    ->where('emergency_log.Reg_Date', '!=', $date)
    ->where('emergency_log.Reg_Date', '>', $one_week)
    ->orderBy('emergency_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','0');

    $request->session()->put('InvoiceType','er');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$today, $all);

}

# End of function invoice_list_er.                          <-------#
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
# Search printable patient invoices [admit];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ admission_logs,
# -----: TABLE :------ doctors.

function invoice_search_admit(Request $request){

    $request->validate([

        'old_patient_search_info'=>'required'

    ]);

    $old_patient_search_info = $request->input('old_patient_search_info');

    # Show searched patients.
    $search['result']=DB::table('admission_logs')
    ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'admission_logs.D_ID', '=', 'doctors.D_ID')
    ->select('admission_logs.*', 'patients.Patient_Name', 'patients.Cell_Number', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department')
    ->where('admission_logs.P_ID','like',$old_patient_search_info)
    ->orwhere('patients.Cell_Number','like',$old_patient_search_info)
    ->orwhere('doctors.Dr_Name','like','%'.$old_patient_search_info.'%')
    ->orderBy('admission_logs.A_ID','desc')
    ->get();

    $request->session()->put('INVOICE','1');
    $request->session()->put('SEARCH_RESULT','1');

    if(count($search['result']) == 0){

        $request->session()->put('SEARCH_RESULT','0');

    }

    $request->session()->put('InvoiceType','admit');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$search);

}

# End of function invoice_search_admit.                     <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Search printable patient invoices [pathology];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ pathology_logs.

function invoice_search_pathology(Request $request){

    $request->validate([

        'old_patient_search_info'=>'required'

    ]);

    $old_patient_search_info = $request->input('old_patient_search_info');

    # Show searched patients.
    $search['result']=DB::table('pathology_log')
    ->join('patients', 'pathology_log.P_ID', '=', 'patients.P_ID')
    ->select('pathology_log.*', 'patients.Patient_Name', 'patients.Cell_Number')
    ->where('pathology_log.P_ID','like',$old_patient_search_info)
    ->orwhere('patients.Cell_Number','like',$old_patient_search_info)
    ->orderBy('pathology_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','1');
    $request->session()->put('SEARCH_RESULT','1');

    if(count($search['result']) == 0){

        $request->session()->put('SEARCH_RESULT','0');

    }

    $request->session()->put('InvoiceType','pathology');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$search);

}

# End of function invoice_search_pathology.                 <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Search printable patient invoices [dental];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ dental_logs,
# -----: TABLE :------ doctors.

function invoice_search_dental(Request $request){

    $request->validate([

        'old_patient_search_info'=>'required'

    ]);

    $old_patient_search_info = $request->input('old_patient_search_info');

    # Show searched patients.
    $search['result']=DB::table('dental_log')
    ->join('patients', 'dental_log.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'dental_log.D_ID', '=', 'doctors.D_ID')
    ->select('dental_log.*', 'patients.Patient_Name', 'patients.Cell_Number', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department')
    ->where('dental_log.P_ID','like',$old_patient_search_info)
    ->orwhere('patients.Cell_Number','like',$old_patient_search_info)
    ->orwhere('doctors.Dr_Name','like','%'.$old_patient_search_info.'%')
    ->orderBy('dental_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','1');
    $request->session()->put('SEARCH_RESULT','1');

    if(count($search['result']) == 0){

        $request->session()->put('SEARCH_RESULT','0');

    }

    $request->session()->put('InvoiceType','dental');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$search);

}

# End of function invoice_search_dental.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Search printable patient invoices [physio];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ patients,
# -----: TABLE :------ physio_log,
# -----: TABLE :------ doctors.

function invoice_search_physio(Request $request){

    $request->validate([

        'old_patient_search_info'=>'required'

    ]);

    $old_patient_search_info = $request->input('old_patient_search_info');

    # Show searched patients.
    $search['result']=DB::table('physio_log')
    ->join('patients', 'physio_log.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'physio_log.D_ID', '=', 'doctors.D_ID')
    ->select('physio_log.*', 'patients.Patient_Name', 'patients.Cell_Number', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department')
    ->where('physio_log.P_ID','like',$old_patient_search_info)
    ->orwhere('patients.Cell_Number','like',$old_patient_search_info)
    ->orwhere('doctors.Dr_Name','like','%'.$old_patient_search_info.'%')
    ->orderBy('physio_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','1');
    $request->session()->put('SEARCH_RESULT','1');

    if(count($search['result']) == 0){

        $request->session()->put('SEARCH_RESULT','0');

    }

    $request->session()->put('InvoiceType','physio');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$search);

}

# End of function invoice_search_physio.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Search printable patient invoices [er];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ emergency_log,
# -----: TABLE :------ doctors.

function invoice_search_er(Request $request){

    $request->validate([

        'old_patient_search_info'=>'required'

    ]);

    $old_patient_search_info = $request->input('old_patient_search_info');

    # Show searched patients.
    $search['result']=DB::table('emergency_log')
    ->join('doctors', 'emergency_log.D_ID', '=', 'doctors.D_ID')
    ->select('emergency_log.*', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department')
    ->orwhere('emergency_log.Ref_Cell_Number','like',$old_patient_search_info)
    ->orwhere('doctors.Dr_Name','like','%'.$old_patient_search_info.'%')
    ->orwhere('emergency_log.Ref_Name','like','%'.$old_patient_search_info.'%')
    ->orwhere('emergency_log.Name','like','%'.$old_patient_search_info.'%')
    ->orderBy('emergency_log.AI_ID','desc')
    ->get();

    $request->session()->put('INVOICE','1');
    $request->session()->put('SEARCH_RESULT','1');

    if(count($search['result']) == 0){

        $request->session()->put('SEARCH_RESULT','0');

    }

    $request->session()->put('InvoiceType','er');

    # Returning to the view below.
    return view('hospital/reception/invoice_generator_list_appointment',$search);

}

# End of function invoice_search_er.                    <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# 
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #




#########################
#### FUNCTION-NO::0 ####
#########################
# Search printable patient invoices [er];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ ot_logs,
# -----: TABLE :------ patients,
# -----: TABLE :------ admission_logs.
# -----: TABLE :------ doctors.

function invoice_search_release_slips(Request $request){

    $request->validate([

        'old_patient_search_info'=>'required'

    ]);

    $old_patient_search_info = $request->input('old_patient_search_info');

    # Show searched patients.
    $search['result']=DB::table('ot_logs')
    ->join('patients', 'ot_logs.P_ID', '=', 'patients.P_ID')
    ->join('doctors', 'ot_logs.D_ID', '=', 'doctors.D_ID')
    ->join('admission_logs', 'ot_logs.A_ID', '=', 'admission_logs.A_ID')
    ->select('patients.Patient_Name', 'patients.Cell_Number', 'patients.P_ID', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department', 'ot_logs.O_ID', 'ot_logs.O_Type', 'admission_logs.A_ID', 'admission_logs.Admission_Date', 'admission_logs.Discharge_Date')
    ->orwhere('patients.P_ID','like',$old_patient_search_info)
    ->orwhere('patients.Cell_Number','like','%'.$old_patient_search_info.'%')
    ->orwhere('doctors.Dr_Name','like','%'.$old_patient_search_info.'%')
    ->orwhere('ot_logs.O_Type','like','%'.$old_patient_search_info.'%')
    ->orderBy('ot_logs.A_ID','desc')
    ->get();

    $request->session()->put('INVOICE','1');
    $request->session()->put('SEARCH_RESULT','1');

    if(count($search['result']) == 0){

        $request->session()->put('SEARCH_RESULT','0');

    }

    # Returning to the view below.
    return view('hospital/accounts/invoice_generator_list_release_slips',$search);

}

# End of function invoice_search_er.                    <-------#
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
# Stores data in 20 sessions;

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
# Stores data in 31 sessions;

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
# Collect data for invoice;
# Stores data in 18 sessions;

function collect_dental_invoice_data(Request $request, $d_t_n){

    $id = $d_t_n;
    session(['dtn' => $id]);
    
    # Gather data.
    $data_logs=DB::table('dental_log')
    ->where('Dental_Test_No',$id)
    ->first();

    $d_id = $data_logs->D_ID;
    $p_id = $data_logs->P_ID;
    
    # Store in session.
    session(['pId' => $p_id]);
    session(['rId' => $data_logs->R_ID]);
    session(['dId' => $data_logs->D_ID]);
    session(['reg_date' => $data_logs->Reg_Date]);
    session(['payment_status' => $data_logs->Payment_Status]);
    session(['total_amount' => $data_logs->Total_Amount]);
    session(['payable_amount' => $data_logs->Payable_Amount]);
    session(['paid_amount' => $data_logs->Paid]);
    session(['received' => $data_logs->Received]);
    session(['changes' => $data_logs->Changes]);
    session(['discount' => $data_logs->Discount]);
    session(['due' => $data_logs->Due_Amount]);
    session(['timestamp' => $data_logs->Time_Stamp]);

    # Gather data.
    $data_patients=DB::table('patients')
    ->where('P_ID',$p_id)
    ->first();

    # Store in session.
    session(['pName' => $data_patients->Patient_Name]);
    session(['pGender' => $data_patients->Patient_Gender]);
    session(['cellNum' => $data_patients->Cell_Number]);
    session(['nid' => $data_patients->NID]);
    session(['nidType' => $data_patients->NID_Type]);
    session(['pAge' => $data_patients->Patient_Age]);

    # Gather data.
    $data_docs=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->first();

    # Store in session.
    session(['dName' => $data_docs->Dr_Name]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/reception/generate/dental/invoice/');

}

# End of function collect_dental_invoice_data.           <-------#
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
# Stores data in 23 sessions;

function collect_pathology_invoice_data(Request $request, $t_n){

    $id = $t_n;
    session(['tn' => $id]);
    
    # Gather data.
    $data_logs=DB::table('pathology_log')
    ->where('Test_No',$id)
    ->first();

    $d_id = $data_logs->D_ID;
    $p_id = $data_logs->P_ID;
    
    # Store in session.
    session(['pId' => $p_id]);
    session(['rId' => $data_logs->R_ID]);
    session(['dId' => $data_logs->D_ID]);
    session(['reg_date' => $data_logs->Reg_Date]);
    session(['del_date' => $data_logs->Delivery_Date]);
    session(['payment_status' => $data_logs->Payment_Status]);
    session(['total_amount' => $data_logs->Total_Amount]);
    session(['payable_amount' => $data_logs->Payable_Amount]);
    session(['paid_amount' => $data_logs->Paid]);
    session(['received' => $data_logs->Received]);
    session(['changes' => $data_logs->Changes]);
    session(['discount' => $data_logs->Discount]);
    session(['due' => $data_logs->Due_Amount]);
    session(['timestamp' => $data_logs->Time_Stamp]);

    # Gather data.
    $data_patients=DB::table('patients')
    ->where('P_ID',$p_id)
    ->first();

    # Store in session.
    session(['pName' => $data_patients->Patient_Name]);
    session(['pGender' => $data_patients->Patient_Gender]);
    session(['cellNum' => $data_patients->Cell_Number]);
    session(['nid' => $data_patients->NID]);
    session(['nidType' => $data_patients->NID_Type]);
    session(['pAge' => $data_patients->Patient_Age]);

    if($d_id != 'self'){

        # Gather data.
        $data_docs=DB::table('doctors')
        ->where('D_ID',$d_id)
        ->first();

        # Store in session.
        session(['dName' => $data_docs->Dr_Name]);

    }else{

        # Store in session.
        session(['dName' => $d_id]);

    }

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/reception/generate/pathology/invoice/');

}

# End of function collect_dental_invoice_data.           <-------#
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
# Stores data in 15 sessions;

function collect_physio_invoice_data(Request $request, $ai_id){

    $id = $ai_id;
    
    # Gather data.
    $data_logs=DB::table('physio_log')
    ->where('AI_ID',$id)
    ->first();

    $d_id = $data_logs->D_ID;
    $p_id = $data_logs->P_ID;
    
    # Store in session.
    session(['pId' => $p_id]);
    session(['rId' => $data_logs->R_ID]);
    session(['dId' => $data_logs->D_ID]);
    session(['reg_date' => $data_logs->Reg_Date]);
    session(['received' => $data_logs->Received]);
    session(['changes' => $data_logs->Changes]);
    session(['fee' => $data_logs->Fee]);
    session(['timestamp' => $data_logs->Time_Stamp]);

    # Gather data.
    $data_patients=DB::table('patients')
    ->where('P_ID',$p_id)
    ->first();

    # Store in session.
    session(['pName' => $data_patients->Patient_Name]);
    session(['pGender' => $data_patients->Patient_Gender]);
    session(['cellNum' => $data_patients->Cell_Number]);
    session(['nid' => $data_patients->NID]);
    session(['nidType' => $data_patients->NID_Type]);
    session(['pAge' => $data_patients->Patient_Age]);

    # Gather data.
    $data_docs=DB::table('doctors')
        ->where('D_ID',$d_id)
        ->first();

    # Store in session.
    session(['dName' => $data_docs->Dr_Name]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/reception/generate/physio/invoice/');

}

# End of function collect_dental_invoice_data.              <-------#
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
# Stores data in 9 sessions;

function collect_er_invoice_data(Request $request, $ai_id){

    $id = $ai_id;
    
    # Gather data.
    $data_logs=DB::table('emergency_log')
    ->where('AI_ID',$id)
    ->first();

    $d_id = $data_logs->D_ID;
    
    # Store in session.
    session(['er_pName' => $data_logs->Name]);
    session(['er_refName' => $data_logs->Ref_Name]);
    session(['er_refCell' => $data_logs->Ref_Cell_Number]);
    session(['er_rId' => $data_logs->R_ID]);
    session(['er_dId' => $d_id]);
    session(['reg_date' => $data_logs->Reg_Date]);
    session(['received' => $data_logs->Received]);
    session(['changes' => $data_logs->Changes]);
    session(['fee' => $data_logs->Bill]);
    session(['timestamp' => $data_logs->Time_Stamp]);

    # Gather data.
    $data_docs=DB::table('doctors')
        ->where('D_ID',$d_id)
        ->first();

    # Store in session.
    session(['dName' => $data_docs->Dr_Name]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/reception/generate/er/invoice/');

}

# End of function collect_er_invoice_data.                  <-------#
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




#########################
#### FUNCTION-NO::0 ####
#########################
# Shows printable patient invoices [ot bill and admission releases];
# Stored data in 1 session;
# Joins table :-
# -----: TABLE :------ ot_logs,
# -----: TABLE :------ patients,
# -----: TABLE :------ admission_ogs.
# -----: TABLE :------ doctors.

function invoice_list_account(Request $request){

    date_default_timezone_set('Asia/Dhaka');
    $date = date("Y-m-d");
    $request->session()->put('DATE_TODAY',$date);

    # check hook
    $hook=DB::table('ot_logs')
    ->join('admission_logs', 'ot_logs.A_ID', '=', 'admission_logs.A_ID')
    ->select('ot_logs.A_ID', 'admission_logs.Payment_Confirmation')
    ->where('admission_logs.Payment_Confirmation','!=',null)
    ->value('admission_logs.Payment_Confirmation');

    if(empty(!$hook)){

        # Show all bills.
        $all['all']=DB::table('admission_logs')
        ->join('patients', 'admission_logs.P_ID', '=', 'patients.P_ID')
        ->join('doctors', 'admission_logs.D_ID', '=', 'doctors.D_ID')
        ->select('patients.Patient_Name', 'patients.Cell_Number', 'patients.P_ID', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department', 'admission_logs.A_ID', 'admission_logs.Admission_Date', 'admission_logs.Discharge_Date', 'admission_logs.Payment_Confirmation')
        ->where('admission_logs.Payment_Confirmation','!=',null)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

        $request->session()->put('ot_related_hook','no');

    }else{

        # Show all bills.
        $all['all']=DB::table('ot_logs')
        ->join('patients', 'ot_logs.P_ID', '=', 'patients.P_ID')
        ->join('doctors', 'ot_logs.D_ID', '=', 'doctors.D_ID')
        ->join('admission_logs', 'ot_logs.A_ID', '=', 'admission_logs.A_ID')
        ->select('patients.Patient_Name', 'patients.Cell_Number', 'patients.P_ID', 'doctors.D_ID', 'doctors.Dr_Name', 'doctors.Dr_Gender', 'doctors.Specialty', 'doctors.Department', 'ot_logs.O_ID', 'ot_logs.O_Type', 'admission_logs.A_ID', 'admission_logs.Admission_Date', 'admission_logs.Discharge_Date', 'admission_logs.Payment_Confirmation')
        ->where('admission_logs.Payment_Confirmation','!=',null)
        ->orderBy('admission_logs.A_ID','desc')
        ->get();

        $request->session()->put('ot_related_hook','yes');

    }

    $request->session()->put('INVOICE','0');

    # Returning to the view below.
    return view('hospital/accounts/invoice_generator_list_release_slips', $all);

}

# End of function invoice_list_account.                     <-------#
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

function collect_accounts_release_slips_data_ot(Request $request, $o_id){

    # Gather data.
    $data_ot_logs=DB::table('ot_logs')
    ->where('O_ID',$o_id)
    ->first();

    $p_id = $data_ot_logs->P_ID;
    $a_id = $data_ot_logs->A_ID;
    $OT_Charge_Income = $data_ot_logs->OT_Charge_Income;
    $Others_Charges = $data_ot_logs->Others_Charges;

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
    session(['o_charge_income' => $OT_Charge_Income]);
    session(['other_charges' => $Others_Charges]);

    session(['a_type' => $data_ot_logs->Anesthesia_Type]);

    session(['ot_timestamp' => $data_ot_logs->Timestamp]);

    # total calculation
        $tot_of_surgeon_cost=DB::table('surgeon_logs')
            ->where('O_ID', $o_id)
            ->sum('Surgeon_Income');

        $tot_of_anesthesiologist_cost=DB::table('anesthesiologist_logs')
            ->where('O_ID', $o_id)
            ->sum('Anesthesiologist_Income');

        $tot_of_nurses_cost=DB::table('ot_nurses_logs')
            ->where('O_ID', $o_id)
            ->sum('Nurse_Fee');

        $tot_of_assistant_cost=DB::table('ot_assistant_logs')
            ->where('O_ID', $o_id)
            ->sum('Assistant_Fee');

        $tots = $OT_Charge_Income+$Others_Charges+$tot_of_surgeon_cost+$tot_of_anesthesiologist_cost+$tot_of_nurses_cost+$tot_of_assistant_cost;

        session(['total_of_ot_slip' => $tots]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/accounts/generate/release/slips/ot/copy');

}

# End of function collect_ot_bill_invoice_data.             <-------#
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
# Stores data in 10 sessions.

function collect_accounts_release_slips_data_admission(Request $request, $a_id){

    session(['aid' => $a_id]);

    # Gather data.
    $data_release_log=DB::table('release_logs')
    ->where('A_ID',$a_id)
    ->first();

    $Ward_Bill = $data_release_log->Ward_Bill;
    $Cabin_Bill = $data_release_log->Cabin_Bill;
    $Ligation_Bill = $data_release_log->Ligation_Bill;
    $Third_Seizure_Bill = $data_release_log->Third_Seizure_Bill;
    $Other_Bill = $data_release_log->Other_Bill;
    $Visiting_Bill = $data_release_log->Visiting_Bill;
    $Total_Bill = $data_release_log->Total_Bill;
    $Estimate = $data_release_log->Estimate;
    $Discount = $data_release_log->Discount;
    $Received = $data_release_log->Received;
    $Changes = $data_release_log->Changes;

    session(['Ward_Bill' => $Ward_Bill]);
    session(['Cabin_Bill' => $Cabin_Bill]);
    session(['Ligation_Bill' => $Ligation_Bill]);
    session(['Third_Seizure_Bill' => $Third_Seizure_Bill]);
    session(['Other_Bill' => $Other_Bill]);
    session(['Visiting_Bill' => $Visiting_Bill]);
    session(['Total_Bill' => $Total_Bill]);
    session(['Estimate' => $Estimate]);
    session(['Discount' => $Discount]);
    session(['Received' => $Received]);
    session(['Changes' => $Changes]);

    # Gather data.
    $data_admission_logs=DB::table('admission_logs')
    ->where('A_ID',$a_id)
    ->first();

    $p_id = $data_admission_logs->P_ID;
    $b_id = $data_admission_logs->B_ID;
    $d_id = $data_admission_logs->D_ID;
    $Admission_Date = $data_admission_logs->Admission_Timestamp;
    $Discharge_Date = $data_admission_logs->Discharge_Timestamp;

    session(['Admission_Date' => $Admission_Date]);
    session(['Discharge_Date' => $Discharge_Date]);


    # Gather data.
    $data_bed_logs=DB::table('beds')
    ->where('B_ID',$b_id)
    ->first();

    # Gather data.
    $data_patients=DB::table('patients')
    ->where('P_ID',$p_id)
    ->first();

    # Gather data.
    $data_doctors=DB::table('doctors')
    ->where('D_ID',$d_id)
    ->first();

    /*# Gather data.
    $data_ot_logs=DB::table('ot_logs')
    ->where('A_ID',$a_id)
    ->first();*/

    # Store in session.
    session(['pId' => $data_patients->P_ID]);
    session(['pName' => $data_patients->Patient_Name]);
    session(['drName' => $data_doctors->Dr_Name]);
    session(['bed_no' => $data_bed_logs->Bed_No]);

    # Redirecting to [FUNCTION-NO::0].
    return redirect('/accounts/generate/release/slips/admission/copy');

}

# End of function collect_ot_bill_invoice_data.             <-------#
                                                                    #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# Note: Hello, future me,
# This will change.
# 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #


















}
