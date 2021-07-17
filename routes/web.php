<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/



/* log in */

Route::view('/','hospital/login');

Route::post('/admin/login_users','App\Http\Controllers\login\login@login_users');




/* log out */

Route::get('/logout', function () {
    session()->forget('REC_SESSION_ID');
    session()->forget('DOC_SESSION_ID');
    session()->forget('ACC_SESSION_ID');
    return redirect('/');
});




/* Reception */

Route::group(['middleware'=>['receptionAuth']],function() {

    Route::view('/reception/home','hospital/reception/home');

    Route::post('/reception/submit_basic_patient_info','App\Http\Controllers\reception\add_patient@submit_basic_patient_info');

    Route::get('/reception/doctor_selection','App\Http\Controllers\reception\add_patient@show_available_doctor');

    Route::post('/reception/submit_doctor_selection','App\Http\Controllers\reception\add_patient@submit_doctor_selection');

    Route::view('/reception/time_selection','hospital/reception/appoint_time');

});


