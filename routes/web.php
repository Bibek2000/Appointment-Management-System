<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return redirect(route('patient.home.view'));
});

Route::get('/register/doctor',[\App\Http\Controllers\Doctor\DoctorController::class, 'registerDoctor'])->name('doctor.register');

Auth::routes();

Route::middleware('superAdmin')->group(function() {
    Route::get('/edit/{id}', [\App\Http\Controllers\Admin\Role\RoleController::class, 'edit'])->name('role.edit');
    Route::get('/destroy/{id}', [\App\Http\Controllers\Admin\Role\RoleController::class, 'destroy'])->name('role.destroy');
    Route::put('/update/{id}', [\App\Http\Controllers\Admin\Role\RoleController::class, 'update'])->name('role.update');
    Route::patch('/toggle-approval/{id}', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'toggleApproval'])->name('toggle.approval');
    Route::get('/create', [\App\Http\Controllers\Admin\Role\RoleController::class, 'create'])->name('role.create');
    Route::post('', [\App\Http\Controllers\Admin\Role\RoleController::class, 'store'])->name('role.store');
    Route::get('/index', [\App\Http\Controllers\Admin\Role\RoleController::class, 'index'])->name('role.index');
    Route::get('/manage/doctors', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'index'])->name('admin.manageDoctor');
    Route::get('/approvedDoctors', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'approveDoctors'])->name('admin.approve.doctor');
    Route::get('/view/Doctor', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'view'])->name('admin.view.doctor');
    Route::get('/show/Doctor', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'show'])->name('admin.show.doctor');
    Route::get('/admin/profile/view', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'create'])->name('admin.view.profile');
    Route::get('/admin/profile/edit/{id}', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'edit'])->name('admin.edit.profile');
    Route::put('/admin/profile/update/{id}', [\App\Http\Controllers\Admin\ManageUser\ManageDoctorController::class, 'update'])->name('admin.update.profile');
    Route::get('/admin/dashboard', [\App\Http\Controllers\Admin\Role\RoleController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('patient')->group(function(){
    Route::post('appointment/save', [\App\Http\Controllers\Doctor\AppointmentController::class, 'store'])->name('appointment.save');
    Route::get('/patient/appointment_show', [\App\Http\Controllers\Patient\PatientController::class, 'show'])->name('appointment.show');
    Route:: delete('appointment/delete/{id}', [\App\Http\Controllers\Patient\PatientController::class, 'destroy'])->name('appointments.destroy');
    Route::get('/appointment/form', [\App\Http\Controllers\Patient\PatientController::class, 'createAppointment'])->name('appointment.form');
    Route::get('/patient', [\App\Http\Controllers\Patient\PatientController::class, 'index'])->name('patient.home.view');
    Route::get('/patient/profile/view', [\App\Http\Controllers\Patient\PatientController::class, 'create'])->name('patient.view.profile');
    Route::get('/patient/profile/edit/{id}', [\App\Http\Controllers\Patient\PatientController::class, 'edit'])->name('patient.edit.profile');
    Route::put('/patient/profile/update/{id}', [\App\Http\Controllers\Patient\PatientController::class, 'update'])->name('patient.update.profile');
    Route::get('/patient/select/doctors/{id}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'show'])->name('doctor.select');
});

Route::post('/create/doctor',[\App\Http\Controllers\Doctor\DoctorController::class, 'createDoctor'])->name('doctor.createDoctor');

Route::middleware('doctor')->group(function(){
    Route::get('/doctor/appointments',[\App\Http\Controllers\Doctor\AppointmentController::class,'index'])->name('doctors.appointments.index');
    Route::patch('/status/approval/{id}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'statusApproval'])->name('patient.status.approval');
    Route:: delete('/destroy/{id}',[\App\Http\Controllers\Doctor\AppointmentController::class,'destroy'])->name('doctors.appointments.destroy');
    Route:: put('/{id}',[\App\Http\Controllers\Doctor\AppointmentController::class,'update'])->name('doctors.appointments.update');
    Route::get('/doctor/profile/view', [\App\Http\Controllers\Doctor\DoctorController::class, 'create'])->name('doctor.view.profile');
    Route::get('/doctor/profile/edit/{id}', [\App\Http\Controllers\Doctor\DoctorController::class, 'edit'])->name('doctor.edit.profile');
    Route::put('/doctor/profile/update/{id}', [\App\Http\Controllers\Doctor\DoctorController::class, 'update'])->name('doctor.update.profile');
});


