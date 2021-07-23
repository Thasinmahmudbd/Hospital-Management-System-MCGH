<?php

namespace App\Http\Controllers\reception;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class add_patient extends Controller
{


    function submit_basic_patient_info(Request $request){

        $request->validate([

            'patient_name'=>'required',
            'patient_gender'=>'required',
            'cell_number'=>'required',
            'nid'=>'required',
            'nid_type'=>'required'

        ]);

        date_default_timezone_set('Asia/Dhaka');
        $ad_date = date("Y/m/d");

        /* Patient id generator */

        $first_part = $request->input('patient_gender');
        
        if($first_part == 'Male'){
            $first_part = 'M';
        }elseif($first_part == 'Female'){
            $first_part = 'F';
            echo $first_part;
        }elseif($first_part == 'Child'){
            $first_part = 'C';
            echo $first_part;
        }elseif($first_part == 'Others'){
            $first_part = 'O';
            echo $first_part;
        }

        $second_part = date("dmY");

        $current_count = DB::table('patients')->select('P_ID')->orderBy('AI_ID','desc')->first();

        if($current_count==null){
            $third_part = 0;
        }else{
            $current_count_array = explode('-',$current_count->P_ID);
            $third_part = end($current_count_array);
            if($third_part == 999){
                $third_part = 0;
            }else{
                $third_part++;
            }
        }

        $P_ID = "$first_part"."-"."$second_part"."-".str_pad($third_part,3,"0",STR_PAD_LEFT);

        /* Patient id generator end */

        $data=array(

            'P_ID'=>$P_ID,
            'Patient_Name'=>$request->input('patient_name'),
            'Patient_Gender'=>$request->input('patient_gender'),
            'Cell_Number'=>$request->input('cell_number'),
            'NID'=>$request->input('nid'),
            'NID_Type'=>$request->input('nid_type'),
            'Ad_Date'=>$ad_date
            
        );

        DB::table('patients')->insert($data);
        
        session(['PATIENT_P_ID' => $P_ID]);
        session(['PATIENT_NAME' => $request->input('patient_name')]);
        session(['PATIENT_GENDER' => $request->input('patient_gender')]);
        session(['PATIENT_CELL' => $request->input('cell_number')]);

        return redirect('/reception/doctor_selection/');

    }

    /*$value = Session::get('variableSetOnPageA');*/

    
    
    
    
    function show_all_doctor(){

        $available_doctor_data['result']=DB::table('doctors')->orderBy('Dr_Name','asc')->get();

        $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();
        
        return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_department);

    }






    function show_doctor_by_department($department){

        $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();

        $available_doctor_data['result']=DB::table('doctors')->where('Department',$department)->orderBy('Dr_Name','asc')->get();

        return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_department);


        /*if($specialty=='show' && $flag=='all'){

            Show All

            $available_doctor_data['result']=DB::table('doctors')->orderBy('Dr_Name','asc')->get();

            return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_Specialty);

        }elseif($flag=='by_search'){

            Search

            $available_doctor_data['result']=DB::table('doctors')->where('Dr_Name','like','%'.$specialty.'%')->orWhere('D_ID',$specialty)->orderBy('Dr_Name','asc')->get();

            return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_Specialty);

        }else{

            By Specialty

            $available_doctor_data['result']=DB::table('doctors')->where('Specialty',$specialty)->orderBy('Dr_Name','asc')->get();

            return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_Specialty);

        }*/

    }









    function search_doctor(Request $request){

        $request->validate([

            'doctor_search_info'=>'required'

        ]);

        $doctor_search_info = $request->input('doctor_search_info');

        $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();

        $available_doctor_data['result']=DB::table('doctors')->where('Dr_Name','like','%'.$doctor_search_info.'%')->orWhere('D_ID','like','%'.$doctor_search_info.'%')->orderBy('Dr_Name','asc')->get();

        return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_department);

    }









    function submit_doctor_selection(Request $request){

        $request->validate([

            'd_id'=>'required',
            'r_id'=>'required',
            'fee'=>'required',
            'p_id'=>'required'

        ]);

        $P_ID = $request->input('p_id');

        $data=array(

            'P_ID'=>$P_ID,
            'D_ID'=>$request->input('d_id'),
            'Basic_Fee'=>$request->input('fee'),
            'R_ID'=>$request->input('r_id')
            
        );

        DB::table('patient_logs')->insert($data);

        $P_log_data=DB::table('patient_logs')->where('P_ID',$P_ID)->orderBy('AI_ID','desc')->first();
        
        session(['P_L_AI_ID' => $P_log_data->AI_ID]);
        session(['D_ID' => $request->input('d_id')]);
        session(['BASIC_FEE' => $request->input('fee')]);
        session(['D_NAME' => $request->input('dr_name')]);

        return redirect('/reception/time_selection');

    }







    function change_doctor(Request $request,$p_l_ai_id){

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->delete();
        
        $available_doctor_department['department']=DB::table('doctors')->select('Department')->distinct()->orderBy('Department','asc')->get();

        $available_doctor_data['result']=DB::table('doctors')->orderBy('Dr_Name','asc')->get();

        return view('hospital/reception/doctor_selection',$available_doctor_data,$available_doctor_department);

    }







    function select_time(Request $request){

        $id = $request->session()->get('D_ID');

        $available_doctor_time['routine']=DB::table('doctor_schedules')->where('D_ID',$id)->orderBy('F','asc')->get();

        return view('hospital/reception/appoint_time',$available_doctor_time);

    }






    function fill_slot_sat(Request $request,$d_s_ai_id){

        $id = $d_s_ai_id;

        $P_ID = $request->session()->get('PATIENT_P_ID');

        $data=array(
            
            'sat'=>$P_ID
        
        );

        DB::table('doctor_schedules')->where('AI_ID',$id)->update($data);

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $F = $time->F;
        $T = $time->T;

        $ap_time = $F. '-' .$T;
        
        $data=array(

            'Ap_Time'=>$ap_time

        );

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        session(['F' => $time->F]);
        session(['T' => $time->T]);

        return redirect('/reception/final/');

    }






    function fill_slot_sun(Request $request,$d_s_ai_id){

        $id = $d_s_ai_id;

        $P_ID = $request->session()->get('PATIENT_P_ID');

        $data=array(
            
            'sun'=>$P_ID
        
        );

        DB::table('doctor_schedules')->where('AI_ID',$id)->update($data);

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $F = $time->F;
        $T = $time->T;

        $ap_time = $F. '-' .$T;
        
        $data=array(

            'Ap_Time'=>$ap_time

        );

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        session(['F' => $time->F]);
        session(['T' => $time->T]);

        return redirect('/reception/final/');

    }






    function fill_slot_mon(Request $request,$d_s_ai_id){
        
        $id = $d_s_ai_id;

        $P_ID = $request->session()->get('PATIENT_P_ID');

        $data=array(
            
            'mon'=>$P_ID
        
        );

        DB::table('doctor_schedules')->where('AI_ID',$id)->update($data);

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $F = $time->F;
        $T = $time->T;

        $ap_time = $F. '-' .$T;
        
        $data=array(

            'Ap_Time'=>$ap_time

        );

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        session(['F' => $time->F]);
        session(['T' => $time->T]);

        return redirect('/reception/final/');

    }






    function fill_slot_tue(Request $request,$d_s_ai_id){

        $id = $d_s_ai_id;

        $P_ID = $request->session()->get('PATIENT_P_ID');

        $data=array(
            
            'tue'=>$P_ID
        
        );

        DB::table('doctor_schedules')->where('AI_ID',$id)->update($data);

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $F = $time->F;
        $T = $time->T;

        $ap_time = $F. '-' .$T;
        
        $data=array(

            'Ap_Time'=>$ap_time

        );

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        session(['F' => $time->F]);
        session(['T' => $time->T]);

        return redirect('/reception/final/');

    }





    function fill_slot_wed(Request $request,$d_s_ai_id){

        $id = $d_s_ai_id;

        $P_ID = $request->session()->get('PATIENT_P_ID');

        $data=array(
            
            'wed'=>$P_ID
        
        );

        DB::table('doctor_schedules')->where('AI_ID',$id)->update($data);

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $F = $time->F;
        $T = $time->T;

        $ap_time = $F. '-' .$T;
        
        $data=array(

            'Ap_Time'=>$ap_time

        );

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        session(['F' => $time->F]);
        session(['T' => $time->T]);

        return redirect('/reception/final/');

    }





    function fill_slot_thu(Request $request,$d_s_ai_id){

        $id = $d_s_ai_id;

        $P_ID = $request->session()->get('PATIENT_P_ID');

        $data=array(
            
            'thu'=>$P_ID
        
        );

        DB::table('doctor_schedules')->where('AI_ID',$id)->update($data);

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $F = $time->F;
        $T = $time->T;

        $ap_time = $F. '-' .$T;
        
        $data=array(

            'Ap_Time'=>$ap_time

        );

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        session(['F' => $time->F]);
        session(['T' => $time->T]);

        return redirect('/reception/final/');

    }






    function fill_slot_fri(Request $request,$d_s_ai_id){

        $id = $d_s_ai_id;

        $P_ID = $request->session()->get('PATIENT_P_ID');

        $data=array(
            
            'fri'=>$P_ID
        
        );

        DB::table('doctor_schedules')->where('AI_ID',$id)->update($data);

        $time = DB::table('doctor_schedules')->where('AI_ID',$id)->first();

        $F = $time->F;
        $T = $time->T;

        $ap_time = $F. '-' .$T;
        
        $data=array(

            'Ap_Time'=>$ap_time

        );

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        session(['F' => $time->F]);
        session(['T' => $time->T]);

        return redirect('/reception/final/');

    }





    function add_date_and_discount(Request $request){

        $p_l_ai_id = $request->session()->get('P_L_AI_ID');
        $fee = $request->session()->get('BASIC_FEE');

        $discount = $request->input('discount');
        $saving = ($discount/100)*$fee;
        $final_fee = $fee-$saving;
        $payment_status = 'Unpaid';

        $data=array(
            
            'Ap_Date'=>$request->input('appoint_date'),
            'Discount'=>$discount,
            'Final_Fee'=>$final_fee,
            'Payment_Status'=>$payment_status
        
        );

        DB::table('patient_logs')->where('AI_ID',$p_l_ai_id)->update($data);

        /* Deleting sessions */

        $request->session()->forget('PATIENT_P_ID');
        $request->session()->forget('PATIENT_NAME');
        $request->session()->forget('PATIENT_GENDER');
        $request->session()->forget('PATIENT_CELL');
        $request->session()->forget('P_L_AI_ID');
        $request->session()->forget('D_ID');
        $request->session()->forget('D_NAME');
        $request->session()->forget('BASIC_FEE');
        $request->session()->forget('F');
        $request->session()->forget('T');

        return redirect('/reception/patient_list/');

    }





    function show_list(){

        $data['result']=DB::table('patient_logs')
        ->join('patients', 'patient_logs.P_ID', '=', 'patients.P_ID')
        ->join('doctors', 'patient_logs.D_ID', '=', 'doctors.D_ID')
        ->select('patient_logs.*', 'patients.*', 'doctors.*')
        ->get();
        
        return view('hospital/reception/patient_list',$data);

    }
}