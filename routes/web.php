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



# Log in

Route::view('/','hospital/login');

Route::post('/admin/login_users','App\Http\Controllers\login\login@login_users');




# Log out.

Route::get('/logout', function () {
    session()->forget('REC_SESSION_ID');
    session()->forget('DOC_SESSION_ID');
    session()->forget('ACC_SESSION_ID');
    return redirect('/');
});




# Reception [CONTROLLER::add_patient.php], [MIDDLEWARE::ReceptionistLoginAuth.php].

Route::group(['middleware'=>['receptionAuth']],function() {

    # Going to home with home set-up
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/reception/home/','App\Http\Controllers\reception\add_patient@set_up_home');

    # [VIEW-NO::01]
    # Going to home without home set-up
    # Returning to hospital/reception/home.blade.php---in-resources/views/.
    Route::view('/reception/home/setup/none','hospital/reception/home');

    # Going to doctor selection panel after collecting basic patient info.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/reception/submit_basic_patient_info','App\Http\Controllers\reception\add_patient@submit_basic_patient_info');

    # Searching old patient.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/reception/find_old_patient/by_search','App\Http\Controllers\reception\add_patient@search_old_patient_from_log');

    # Doctor selection page.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/reception/doctor_selection','App\Http\Controllers\reception\add_patient@show_all_doctor');

    # Doctor selection page department side-bar action buttons.
    # Redirecting to [FUNCTION-NO::05]---in-controller.
    Route::get('/reception/doctor_selection/by_department/{department}','App\Http\Controllers\reception\add_patient@show_doctor_by_department');

    # Doctor selection page search-bar action button.
    # Redirecting to [FUNCTION-NO::06]---in-controller.
    Route::post('/reception/doctor_selection/by_search','App\Http\Controllers\reception\add_patient@search_doctor');
    
    # After selecting doctor.
    # Redirecting to [FUNCTION-NO::07]---in-controller.
    Route::post('/reception/submit_doctor_selection','App\Http\Controllers\reception\add_patient@submit_doctor_selection');

    # Showing time table based on selected doctor.
    # Redirecting to [FUNCTION-NO::08]---in-controller.
    Route::get('/reception/time_selection','App\Http\Controllers\reception\add_patient@show_available_time');

    # Selecting time.
    # Redirecting to [FUNCTION-NO::09]---in-controller.
    Route::get('/reception/set_time/{d_s_ai_id}','App\Http\Controllers\reception\add_patient@set_time');

    # Changing date.
    # Redirecting to [FUNCTION-NO::10]---in-controller.
    Route::post('reception/change_date','App\Http\Controllers\reception\add_patient@change_date');

    # Cancelling appointment.
    # Redirecting to [FUNCTION-NO::11]---in-controller.
    Route::get('/reception/cancel_appointment','App\Http\Controllers\reception\add_patient@cancel_appointment');

    # Patient data entry in table patients & patient_logs, data update in doctor_schedules table */
    # Redirecting to [FUNCTION-NO::12]---in-controller.
    Route::post('/reception/patient_data_entry_for_doctor_appointment','App\Http\Controllers\reception\add_patient@patient_data_entry_for_doctor_appointment');

    # Reading data in Patient list page.
    # Redirecting to [FUNCTION-NO::13]---in-controller.
    Route::get('/reception/patient_list/','App\Http\Controllers\reception\add_patient@show_list');

    /*Route::get('/', function () {
        $pdf = PDF::loadView("pdf.invoices_mcgh");

        return $pdf->stream('invoice.pdf');
        return view('welcome');
    });*/












    


});






# Reception [CONTROLLER::], [MIDDLEWARE::DoctorLoginAuth.php].
Route::group(['middleware'=>['doctorAuth']],function() {

    # Going to home with home set-up.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/doctor/home/','App\Http\Controllers\doctor\profile@set_up_home');

    # Showing the patients that the doctor has treated today.
    # Returning to hospital/doctor/patient_list---in-resources/views/.
    Route::get('/doctor/patients/','App\Http\Controllers\doctor\profile@show_treated_patients');

    # Showing the doctors schedule.
    # Returning to hospital/doctor/schedule---in-resources/views/.
    Route::get('/doctor/schedule/','App\Http\Controllers\doctor\profile@show_schedule');

    # Showing the doctors log.
    # Returning to hospital/doctor/log---in-resources/views/.
    Route::get('/doctor/log/','App\Http\Controllers\doctor\profile@show_logs');
    
    # Going to edit_profile view.
    # Redirecting to hospital/doctor/edit_profile---in-resources/views/.
    Route::view('/doctor/edit_profile/','hospital/doctor/edit_profile');

});