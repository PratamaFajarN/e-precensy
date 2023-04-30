<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Staff\StaffController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Jabatan\JabatanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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


    Route::post('singout',[LoginController::class,'singout'])->name('singout');
    Route::get('register',[RegisterController::class,'index'])->name('register');
    Route::post('registerpost',[RegisterController::class,'registerpost'])->name('registerpost');

    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'loginStore'])->name('login');

    Route::get('/dashboard/index',  [DashboardController::class, 'index'])->middleware('auth');


    Route::controller(StaffController::class)->group(function () {
    Route::get('dashboard/staff', 'index');
    Route::post('getemploye', 'getemploye');
    });

    Route::controller(JabatanController::class)->group(function () {
        Route::get('dashboard/jabatan', 'index');
        Route::post('request/jabatanPost','jabatanPost')->name('ajaxjabatanPost');
        Route::post('request/jabatanUpdate','jabatanUpdate')->name('ajaxjabatanUpdate');
        Route::post('getJabatan','getJabatan')->name('getJabatan');
        Route::post('delete','jabatanDestroy')->name('deleteJabatan');
    });
    Route::controller(CompanyController::class)->group(function () {
        Route::get('dashboard/company', 'index');
        Route::post('request/updatecompany','updatecompany')->name('updateCompany');
        Route::get('getMap','getMap')->name('getDataMap');

    });



