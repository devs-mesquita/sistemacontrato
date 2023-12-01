<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');

Route::group(['middleware' => 'auth'], function () {

	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

	Route::get('/', [HomeController::class, 'index'])->name('home');

	Route::resources([
		'contrato' => ContratoController::class,
		'user'	   => UserController::class,
	]);

	Route::get('alterasenha',	[UserController::class, 'alterasenha'])->name('alterasenha');
	Route::post('postalterasenha', 	[UserController::class, 'postalterasenha'])->name('postalterasenha');
	Route::get('/user/{id}/edit', 	[UserController::class, 'edit'])->name('users.edit');
	Route::get('/user/{id}', 	[UserController::class, 'update'])->name('users.update');
	Route::post('/atualizacontrato/{id}', 	[ContratoController::class, 'updateContrato'])->name('updateContrato');
	// Route::get('/user/{id}/destroy', 	[UserController::class, 'destroy'])->name('users.destroy');
	// Route::get(
	// 	'user',
	// 	[UserController::class, 'index']
	// )->name('index');

	// Route::get(
	// 	'user/create',
	// 	[UserController::class, 'create']
	// )->name('create');

	// Route::post(
	// 	'user',
	// 	[UserController::class, 'store']
	// )->name('user.store');

	// Route::get(
	// 	'user',
	// 	[UserController::class, 'edit']
	// )->name('edit');
});

