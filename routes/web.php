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
Route::get('/main', \App\Http\Controllers\MainController::class.'@index')->name('user.main')->middleware('checkIfAdmin');
Route::get('/logout', \App\Http\Controllers\AuthController::class.'@logout')->name('user.logout');
Route::get('admin/user-registration', \App\Http\Controllers\UserRegistrationController::class.'@index')->name('admin.registration')->middleware('checkIfAdmin');
Route::post('/authentication/authenticate', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('authentication.authenticate');
Route::post('/admin/user-registration/register', [\App\Http\Controllers\UserRegistrationController::class, 'register'])->name('admin.registration.register')->middleware('checkIfAdmin');
Route::get('/admin/update-user-data', \App\Http\Controllers\UpdateUserDataController::class.'@index')->name('admin.updateUserData')->middleware('checkIfAdmin');
Route::post('/admin/update-user-data/update', [\App\Http\Controllers\UpdateUserDataController::class, 'update'])->name('admin.updateUserData.update')->middleware('checkIfAdmin');
Route::post('/admin/update-user-data/delete', [\App\Http\Controllers\UpdateUserDataController::class, 'delete'])->name('admin.updateUserData.delete')->middleware('checkIfAdmin');
Route::get('/admin/update-server-id', \App\Http\Controllers\UpdateServerIdController::class.'@index')->name('admin.updateServerId')->middleware('checkIfAdmin');
Route::post('/admin/update-server-id/update', UpdateServerIdController::class.'@update')->name('admin.updateServerId.update')->middleware('checkIfAdmin');
Route::get('/admin/keygen', \App\Http\Controllers\KeyGenController::class.'@index')->name('admin.keygen')->middleware('checkIfAdmin');
