<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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




// Route::get('/', [RegistrationController::class, 'show_registation']);

Route::get('country-state-city', [RegistrationController::class, 'index'])->name('country-state-city');
Route::post('get-states-by-country',[RegistrationController::class, 'getState']);
Route::post('get-cities-by-state',[RegistrationController::class, 'getCity']);
// Route::post('ajax/validation/store', [RegistrationController::class, 'ajaxValidationStore'])->name('ajax.validation.store');
Route::post('sendform', [RegistrationController::class, 'send_form'])->name('sendform');