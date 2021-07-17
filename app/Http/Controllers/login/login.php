<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class login extends Controller
{
    function login_users(Request $request){
        $user_id=$request->input('user_id');
        $password=$request->input('password');

        $result=DB::table('logins')->where('Emp_ID',$user_id)->where('Log_Password',$password)->get();

        if(isset($result[0]->AI_ID)){

            if($result[0]->status==1){
                $request->session()->put('REC_SESSION_ID',$result[0]->Emp_ID);

                $token_array = explode('-',$user_id);
                $token = current($token_array);

                if($token=='R' || $token=='r'){
                    return redirect('/reception/home');
                }

            }else{
                $request->session()->flash('msg','Account Deactivated.');
                return redirect('/');
            }

        }else{
            $request->session()->flash('msg','Please Enter Valid Login Info.');
            return redirect('/');
        }

    }
}
