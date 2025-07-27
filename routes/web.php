<?php

use App\Http\Controllers\FeedsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->middleware('guest')->name('login');
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');

/*
 *   Test
 */

Route::get('/test', [TestController::class, 'gradeTest']);
Route::post('/test/validation', [TestController::class, 'validationTest']);


/*
 *   Authentikáció
 */
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::post("/logout", [UserController::class, 'logout']);

/*
 *   Hirfolyam
 */
Route::get('/feeds', [FeedsController::class, 'index']);
Route::get('/feed/{id}', [FeedsController::class, 'show']);
Route::get('/feeds/create', [FeedsController::class, 'create'])->middleware(IsAdmin::class);
Route::post('/feeds/store', [FeedsController::class, 'store'])->middleware(IsAdmin::class);
Route::get('/feed/{id}/edit', [FeedsController::class, 'edit'])->middleware(IsAdmin::class);
Route::put('/feed/{id}', [FeedsController::class, 'update'])->middleware(IsAdmin::class);
Route::delete('/feed/{id}', [FeedsController::class, 'destroy'])->middleware(IsAdmin::class);

/*
 * Üzenetek
 */

Route::get('/messages', [MessagesController::class, 'index']);
Route::get('/messages/create', [MessagesController::class, 'create']);
Route::post('/messages/store', [MessagesController::class, 'Store']);
Route::get('/message/{id}', [MessagesController::class, 'show']);
Route::post('/message/{id}/send', [MessagesController::class, 'store']);

/*
 * Admin
 */
Route::get('/admin', function () {
    return view('admin');
});

/*
 * Student
 */

Route::get('/students', [UserController::class, 'AllStudents']);
Route::get('/students/{id}', [UserController::class, 'show']);
