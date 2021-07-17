<?php

namespace App\Http\Controllers\reception;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class add_patient extends Controller
{


    function submit_basic_patient_info(Request $request)
    {

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
        
        if($first_part == 'male'){
            $first_part = 'M';
        }elseif($first_part == 'female'){
            $first_part = 'F';
            echo $first_part;
        }elseif($first_part == 'child'){
            $first_part = 'C';
            echo $first_part;
        }elseif($first_part == 'others'){
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

        return redirect('/reception/doctor_selection');

    }

    /*$value = Session::get('variableSetOnPageA');*/

    
    
    
    
    function show_available_doctor()
    {

        $available_doctor_data['result']=DB::table('doctors')->orderBy('Dr_Name','asc')->get();
        
        return view('hospital/reception/doctor_selection',$available_doctor_data);

    }






    function submit_doctor_selection(Request $request)
    {

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

}
