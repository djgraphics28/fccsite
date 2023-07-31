<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/registration',[RegistrationController::class, 'index'])->name('registration');
Route::post('/registration',[RegistrationController::class, 'store'])->name('registration.store');
Route::get('/success/{id}',[RegistrationController::class, 'success'])->name('registration.success');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('members', MemberController::class);

    Route::resource('groups', GroupController::class);

    Route::resource('families', FamilyController::class);

});



