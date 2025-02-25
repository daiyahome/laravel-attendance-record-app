<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/attendance', [RecordController::class, 'index']);
});

Route::get('/attendance', [RecordController::class, 'index']);

// ログイン後のリダイレクト先
Route::get('/dashboard', function () {
    return view('users.index'); // index.blade.phpを表示
})->middleware(['auth']); // 認証後のみアクセス可能

Route::get('/attendance-calendar', function () {
    return view('users.index');
})->middleware('auth'); // ログインしていないとアクセスできない


// FullCalendarで使用するAPI用のルート
Route::get('/api/record', [RecordController::class, 'index']);

// 出退勤記録を表示するカレンダーページのルート
Route::get('/attendance-calendar', function () {
    return view('users.index'); // index.blade.phpを表示
});


require __DIR__.'/auth.php';
