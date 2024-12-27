<?php

use App\Http\Controllers\UpdateServerIdController;
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

Route::get('/', \App\Http\Controllers\AuthController::class.'@index')->name('authentication');
Route::get('/authentication', \App\Http\Controllers\AuthController::class.'@index')->name('authentication');
Route::get('/update-password', \App\Http\Controllers\UpdatePasswordController::class.'@index')->name('user.update-password')->middleware('checkAccess');
Route::post('/update-password', \App\Http\Controllers\UpdatePasswordController::class.'@updatePassword')->name('user.update-password.update')->middleware('checkAccess');
Route::get('/main', \App\Http\Controllers\MainController::class.'@index')->name('user.main')->middleware('checkAccess');
Route::get('/how-to-setup', \App\Http\Controllers\HowToSetupPageController::class.'@index')->name('user.howToSetup')->middleware('checkAccess');
Route::get('/logout', \App\Http\Controllers\AuthController::class.'@logout')->name('user.logout');
Route::get('admin/user-registration', \App\Http\Controllers\UserRegistrationController::class.'@index')->name('admin.registration')->middleware('checkAccess');
Route::post('/authentication/authenticate', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('authentication.authenticate');
Route::post('/admin/user-registration/register', [\App\Http\Controllers\UserRegistrationController::class, 'register'])->name('admin.registration.register')->middleware('checkAccess');
Route::get('/admin/update-user-data', \App\Http\Controllers\UpdateUserDataController::class.'@index')->name('admin.updateUserData')->middleware('checkAccess');
Route::post('/admin/update-user-data/update', [\App\Http\Controllers\UpdateUserDataController::class, 'update'])->name('admin.updateUserData.update')->middleware('checkAccess');
Route::post('/admin/update-user-data/delete', [\App\Http\Controllers\UpdateUserDataController::class, 'delete'])->name('admin.updateUserData.delete')->middleware('checkAccess');
Route::get('/admin/update-server-id', \App\Http\Controllers\UpdateServerIdController::class.'@index')->name('admin.updateServerId')->middleware('checkAccess');
Route::post('/admin/update-server-id/update', UpdateServerIdController::class.'@update')->name('admin.updateServerId.update')->middleware('checkAccess');
Route::get('/admin/keygen', \App\Http\Controllers\KeyGenController::class.'@index')->name('admin.keygen')->middleware('checkAccess');
