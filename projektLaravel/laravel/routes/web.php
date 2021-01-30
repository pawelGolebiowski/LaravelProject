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

Route::get('/', function () {
    return view('welcome');
});

Route::get('doctors/edit/{id}', 'App\Http\Controllers\DoctorController@edit');

Route::get('doctors/create', 'App\Http\Controllers\DoctorController@create');

Route::post('doctors/create', 'App\Http\Controllers\DoctorController@store');

Route::get('doctors', 'App\Http\Controllers\DoctorController@index');

Route::get('doctors/{id}', 'App\Http\Controllers\DoctorController@show');

Route::get('doctors/specializations/{id}', 'App\Http\Controllers\DoctorController@listBySpecialization');

Route::get('doctors/delete/{id}', 'App\Http\Controllers\DoctorController@delete');

Route::get('patients', 'App\Http\Controllers\PatientController@index');

Route::get('patients/{id}', 'App\Http\Controllers\PatientController@show');

Route::get('specializations/', 'App\Http\Controllers\SpecializationController@index');

Route::get('specializations/create', 'App\Http\Controllers\SpecializationController@create');

Route::post('specializations/', 'App\Http\Controllers\SpecializationController@store');

Route::get('visits/', 'App\Http\Controllers\VisitController@index');

Route::get('visits/create', 'App\Http\Controllers\VisitController@create');

Route::post('visits/', 'App\Http\Controllers\VisitController@store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
