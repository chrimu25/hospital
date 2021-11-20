<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\HospitalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'verify'=>true
]);


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class,'index'])->name('dashboard');
    Route::get('hospitals-admin', [AdminController::class,'admins'])->name('admins');
    Route::get('hospitals-admin/create',[AdminController::class,'create'])->name('admins.create');
    Route::post('hospitals-admin/create',[AdminController::class,'store'])->name('admins.store');
});

Route::middleware(['auth', 'hospital'])->prefix('hospital')->name('hospital.')->group(function () {
    Route::get('dashboard', [HospitalController::class,'index'])->name('dashboard');
    Route::get('doctors', [HospitalController::class,'docs'])->name('doctors');
    Route::get('doctors/create', [HospitalController::class,'doctors'])->name('doctors.create');
    Route::post('doctors/store', [HospitalController::class,'store'])->name('doctors.store');
});

Route::middleware(['auth', 'doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('dashboard', [DoctorsController::class,'index'])->name('dashboard');
    Route::get('patients', [DoctorsController::class,'patients'])->name('patients');
    Route::get('patients/insert-new', [DoctorsController::class,'create'])->name('ptients.create');
    Route::post('patients/insert-new', [DoctorsController::class,'store'])->name('ptients.store');
    Route::get('patients/{patient}', [DoctorsController::class,'show'])->name('ptients.show');
    Route::post('patients/prescription', [DoctorsController::class,'prescription'])->name('ptients.prescript');
});

Route::middleware(['auth', 'patient'])->name('patient.')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
