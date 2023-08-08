<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VbsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CertificateTemplateController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/registration',[RegistrationController::class, 'index'])->name('registration');
Route::post('/registration',[RegistrationController::class, 'store'])->name('registration.store');
Route::get('/success/{id}',[RegistrationController::class, 'success'])->name('registration.success');

//Signature
Route::get('/submit-e-signature/{id}', [RegistrationController::class, 'submitESignature'])->name('e-signature');
Route::post('/signature-store', [RegistrationController::class, 'storeSignature'])->name('signature.store');

Auth::routes(['register'=>false]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::get('/roles', [UserController::class, 'getRoles'])->name('roles');

    Route::resource('members', MemberController::class);

    Route::resource('groups', GroupController::class);

    Route::resource('families', FamilyController::class);

    Route::get('/birthday-celebrators', [BirthdayController::class, 'index'])->name('birthday.celebrators');

    Route::get('/vbs', [VbsController::class, 'index'])->name('vbs.index');

    Route::resource('cert', CertificateTemplateController::class);

    Route::get('/generate-certificate/{memberId}/{tempId}', [CertificateController::class, 'generateCertificate'])->name('generate.certificate');

});



