<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;

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

Route::get('php', function (){
    print_r(phpinfo());
});

Route::get('/', [LoginController::class, 'index'])->name('login-page');

Route::get('/login', [LoginController::class, 'login'])->name('login-page')->middleware('logged_in');

Route::post('/login', [LoginController::class, 'send_mail'])->name('send_mail');

Route::get('/authenticate/{code}', [LoginController::class, 'authenticate'])->name('authentication');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('authcheck')->name('dashboard');

Route::get('/add-page/{page_uid}', [PageController::class, 'add_page'])->middleware('authcheck')->name('add-page');

Route::post('/add-page', [PageController::class, 'save_page'])->name('save-page');

Route::get('/qr-image/{page_uid}', [PageController::class, 'show_qr'])->name('show-qr-image');

Route::get('/page/{page_uid}', [PageController::class, 'show_page'])->name('show-page');

Route::post('/delete_page', [PageController::class, 'delete_page'])->name('delete-page');

Route::get('/edit-page/{page_uid}', [PageController::class, 'edit_page'])->middleware('authcheck')->name('edit-page');

Route::post('/edit-page', [PageController::class, 'update_page'])->name('update-page');

Route::get('/preview_theme/{title}', [PageController::class, 'preview_theme'])->name('preview-theme');

// Route::get('/add-theme/{page_uid}', [PageController::class, 'add_theme'])->name('add-theme');