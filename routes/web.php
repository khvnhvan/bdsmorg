<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CalendarController;

Route::group(['prefix' => 'org'],function () {
    Route::get('/register', [OrganizerController::class, 'register'])->name('register');
    Route::post('/register', [OrganizerController::class, 'checkregister'])->name('checkregister');
    Route::get('/', [OrganizerController::class, 'login'])->name('org.login');
    Route::post('/', [OrganizerController::class, 'checklogin'])->name('org.checklogin');
    Route::get('/logout', [OrganizerController::class, 'logout'])->name('org.logout');
});

Route::group(['prefix' => 'org', 'middleware' => 'auth'],function () {
    Route::get('/dashboard', [OrganizerController::class, 'dashboard'])->name('org.dashboard');
    Route::get('/org_info', [OrganizerController::class, 'orgInfo'])->name('org.org_info');
    Route::get('/cus_detail/{id}', [OrganizerController::class, 'cus_detail'])->name('org.cus_detail');
    Route::get('/info_inday', [OrganizerController::class, 'infoInday'])->name('org.info_inday');
    Route::get('/info_inday/{id}', [OrganizerController::class, 'infoInday_search'])->name('org.info_inday_search');
    Route::get('/cus_info', [OrganizerController::class, 'cusInfo'])->name('org.cus_info');
    Route::get('/create_cus', [OrganizerController::class, 'create_cus'])->name('org.create_cus');
    Route::post('/create_cus', [OrganizerController::class, 'store_cus'])->name('org.store_cus');
    Route::get('/update_cus/{id}', [OrganizerController::class, 'update_cus'])->name('org.update_cus');
    Route::put('/update_cus/{id}', [OrganizerController::class, 'update_cus_check'])->name('org.update_cus_check');
    Route::get('/update_infoinday/{id}', [OrganizerController::class, 'update_infoinday'])->name('org.update_infoinday');
    Route::put('/update_infoinday/{id}', [OrganizerController::class, 'update_infoinday_check'])->name('org.update_infoinday_check');
    Route::get('/donate-history/{ngayHienTai}/hom-truoc', [OrganizerController::class, 'ngayHomTruoc'])->name('org.homtruoc');
    Route::get('/donate-history/{ngayHienTai}/hom-sau', [OrganizerController::class, 'ngayHomSau'])->name('org.homsau');
    Route::delete('/delete_cus/{id}', [OrganizerController::class, 'delete_cus'])->name('org.delete_cus');

    Route::get('/create_emp', [OrganizerController::class, 'create_emp'])->name('org.create_emp');
    Route::post('/create_emp', [OrganizerController::class, 'store_emp'])->name('org.store_emp');
    Route::get('/update_emp/{id}', [OrganizerController::class, 'update_emp'])->name('org.update_emp');
    Route::put('/update_emp/{id}', [OrganizerController::class, 'update_emp_check'])->name('org.update_emp_check');
    Route::delete('/delete_emp/{id}', [OrganizerController::class, 'delete_emp'])->name('org.delete_emp');
    Route::get('/clinic/{id}', [OrganizerController::class, 'clinic'])->name('org.clinic');

    Route::get('/appt_schedule', [OrganizerController::class, 'apt_schedule'])->name('org.apt_schedule');
    Route::get('/create_appt', [CalendarController::class, 'create_appt'])->name('org.create_appt');
    Route::post('/create_appt', [CalendarController::class, 'create_appt_check'])->name('org.create_appt_check');
    Route::get('/update_appt/{id}', [CalendarController::class, 'update_appt'])->name('org.update_appt');
    Route::put('/update_appt/{id}', [CalendarController::class, 'update_appt_check'])->name('org.update_appt_check');
    Route::delete('/delete_appt/{id}', [CalendarController::class, 'delete_appt'])->name('org.delete_appt');
});





Route::group(['prefix' => 'emp'],function () {
    Route::get('/', [EmployeeController::class, 'login'])->name('emp.login');
    Route::post('/', [EmployeeController::class, 'checklogin'])->name('emp.checklogin');
    Route::get('/logout', [EmployeeController::class, 'logout'])->name('emp.logout');
});

Route::group(['prefix' => 'emp', 'middleware' => 'employee'],function () {
    Route::get('/dashboard', [EmployeeController::class,'dashboard'])->name('emp.dashboard');
    Route::get('/emp_info', [EmployeeController::class, 'emp_info'])->name('emp.emp_info');
    Route::get('/update_emp/{id}', [EmployeeController::class, 'update_emp'])->name('emp.update_emp');
    Route::put('/update_emp/{id}', [EmployeeController::class, 'update_emp_check'])->name('emp.update_emp_check');
    Route::get('/info_inday', [EmployeeController::class, 'info_inday'])->name('emp.info_inday');
    Route::get('/update_infoinday/{id}', [EmployeeController::class, 'update_infoinday'])->name('emp.update_infoinday');
    Route::put('/update_infoinday/{id}', [EmployeeController::class, 'update_infoinday_check'])->name('emp.update_infoinday_check');
    Route::get('/donate-history/{ngayHienTai}/hom-truoc', [EmployeeController::class, 'ngayHomTruoc'])->name('emp.homtruoc');
    Route::get('/donate-history/{ngayHienTai}/hom-sau', [EmployeeController::class, 'ngayHomSau'])->name('emp.homsau');
    Route::get('/cus_info', [EmployeeController::class, 'cusInfo'])->name('emp.cus_info');
    Route::get('/cus_detail/{id}', [EmployeeController::class, 'cus_detail'])->name('emp.cus_detail');
    Route::get('/create_cus', [EmployeeController::class, 'create_cus'])->name('emp.create_cus');
    Route::post('/create_cus', [EmployeeController::class, 'store_cus'])->name('emp.store_cus');
    Route::get('/update_cus/{id}', [EmployeeController::class, 'update_cus'])->name('emp.update_cus');
    Route::put('/update_cus/{id}', [EmployeeController::class, 'update_cus_check'])->name('emp.update_cus_check');
    Route::get('/clinic', [EmployeeController::class, 'clinic'])->name('emp.clinic');
    Route::get('/appt_schedule', [EmployeeController::class, 'appt_schedule'])->name('emp.appt_schedule');
});





Route::group(['prefix' => 'doc'],function () {
    Route::get('/', [DoctorController::class, 'login'])->name('doc.login');
    Route::post('/', [DoctorController::class, 'checklogin'])->name('doc.checklogin');
    Route::get('/logout', [DoctorController::class, 'logout'])->name('doc.logout');
});

Route::group(['prefix' => 'doc', 'middleware' => 'doctor'],function () {
    Route::get('/dashboard', [DoctorController::class,'dashboard'])->name('doc.dashboard');
    Route::get('/emp_info', [DoctorController::class, 'emp_info'])->name('doc.emp_info');
    Route::get('/update_emp/{id}', [DoctorController::class, 'update_emp'])->name('doc.update_emp');
    Route::put('/update_emp/{id}', [DoctorController::class, 'update_emp_check'])->name('doc.update_emp_check');
    Route::get('/info_inday', [DoctorController::class, 'info_inday'])->name('doc.info_inday');
    Route::get('/update_infoinday/{id}', [DoctorController::class, 'update_infoinday'])->name('doc.update_infoinday');
    Route::put('/update_infoinday/{id}', [DoctorController::class, 'update_infoinday_check'])->name('doc.update_infoinday_check');
    Route::get('/cus_info', [DoctorController::class, 'cusInfo'])->name('doc.cus_info');
    Route::get('/cus_detail/{id}', [DoctorController::class, 'cus_detail'])->name('doc.cus_detail');
    Route::get('/appt_schedule', [DoctorController::class, 'appt_schedule'])->name('doc.appt_schedule');
    Route::get('/donate-history/{ngayHienTai}/hom-truoc', [DoctorController::class, 'ngayHomTruoc'])->name('doc.homtruoc');
    Route::get('/donate-history/{ngayHienTai}/hom-sau', [DoctorController::class, 'ngayHomSau'])->name('doc.homsau');
    Route::get('/update_cus/{id}', [DoctorController::class, 'update_cus'])->name('doc.update_cus');
    Route::put('/update_cus/{id}', [DoctorController::class, 'update_cus_check'])->name('doc.update_cus_check');
    Route::get('/clinic', [DoctorController::class, 'clinic'])->name('doc.clinic');
});







