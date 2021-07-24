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

    /* 
    from login page to view reception home page.
    */
    Route::view('/reception/home/','hospital/reception/home');

    /* 
    from reception home page to controller[add_patient](submit_basic_patient_info), 
    from controller[add_patient](submit_basic_patient_info) to controller[add_patient](show_all_doctor).
    */
    Route::post('/reception/submit_basic_patient_info','App\Http\Controllers\reception\add_patient@submit_basic_patient_info');

    /*  
    from controller[add_patient](show_all_doctor) to view doctor selection page.
    */
    Route::get('/reception/doctor_selection','App\Http\Controllers\reception\add_patient@show_all_doctor');

    /*  
    from controller[add_patient](show_doctor_by_department) to view doctor selection page.
    */
    Route::get('/reception/doctor_selection/by_department/{department}','App\Http\Controllers\reception\add_patient@show_doctor_by_department');

    /*  
    from controller[add_patient](search_doctor) to view doctor selection page.
    */
    Route::post('/reception/doctor_selection/by_search','App\Http\Controllers\reception\add_patient@search_doctor');

    /*  
    from view doctor selection page to controller[add_patient](submit_doctor_selection),
    from controller[add_patient](submit_doctor_selection) to controller[add_patient](show_available_time).
    */
    Route::post('/reception/submit_doctor_selection','App\Http\Controllers\reception\add_patient@submit_doctor_selection');

    /*  
    from controller[add_patient](show_available_time) to view time selection page.
    */
    Route::get('/reception/time_selection','App\Http\Controllers\reception\add_patient@show_available_time');

    /*  
    from view time selection page to controller[add_patient](change_doctor),
    from controller[add_patient](change_doctor) to view doctor selection page.
    */
    Route::get('/reception/doctor_selection/reselection/{p_l_ai_id}','App\Http\Controllers\reception\add_patient@change_doctor');

    /*  
    from view time selection page to controller[add_patient](fill_slot_...).
    */
    Route::get('/reception/take_spot_sat/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@fill_slot_sat');
    Route::get('/reception/take_spot_sun/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@fill_slot_sun');
    Route::get('/reception/take_spot_mon/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@fill_slot_mon');
    Route::get('/reception/take_spot_tue/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@fill_slot_tue');
    Route::get('/reception/take_spot_wed/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@fill_slot_wed');
    Route::get('/reception/take_spot_thu/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@fill_slot_thu');
    Route::get('/reception/take_spot_fri/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@fill_slot_fri');

    /*  
    from controller[add_patient](fill_slot_...) to controller[add_patient](set_time_in_patient_log).
    */
    Route::get('/reception/set_time_in_patient_log/','App\Http\Controllers\reception\add_patient@set_time_in_patient_log');

    /*  
    from controller[add_patient](set_time_in_patient_log) to view final page.
    */
    Route::view('/reception/final/','hospital/reception/final');

    /*  
    from view final page to controller[add_patient](add_date_and_discount).
    */
    Route::post('/reception/date_and_discount','App\Http\Controllers\reception\add_patient@add_date_and_discount');

    /*  
    from view final page to controller[add_patient](change_time),
    from controller[add_patient](change_time) to view time selection page.
    */
    Route::get('/reception/time_selection/reselection/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@change_time');

    /*  
    from view final page to controller[add_patient](cancel_appointment),
    from controller[add_patient](cancel_appointment) to view reception home page.
    */
    Route::get('/reception/cancel_appointment/','App\Http\Controllers\reception\add_patient@cancel_appointment');

    /* 
    from controller[add_patient](add_date_and_discount) to controller[add_patient](show_list),
    from controller[add_patient](show_list) to view patient list page.
    */
    Route::get('/reception/patient_list/','App\Http\Controllers\reception\add_patient@show_list');

});


