<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersChangeController;
use Illuminate\Support\Facades\Auth;

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

// Route::resource('/users', App\Http\Controllers\UsersController::class);
// Route::resource('/types', App\Http\Controllers\TypesController::class);

Route::resources([
    'users' => App\Http\Controllers\UsersController::class,
    'types' => App\Http\Controllers\TypesController::class,
    'notesdelete' => App\Http\Controllers\NotesDeleteController::class,
    'friends' => App\Http\Controllers\FriendsController::class

]);
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/searchdelete', [SearchController::class, 'searchdelete'])->name('searchdelete');
Route::get('/login', [AdminController::class, 'dangnhap'])->name('login');
Route::get('/dangnhap', function () {
    return view('frontend.users.dangnhap');
});

Route::get('/dangnhapquanly', function () {
    return view('quanly.dangnhap');
})->name('dangnhapquanly');
Route::post('/quanly', [AdminController::class, 'quanly'])->name('quanly');;

Route::get('/dangxuatquanly', [AdminController::class, 'dangxuatquanly'])->name('dangxuatquanly');;

Route::get('/logout', [UsersChangeController::class, 'dangxuat'])->name('logout');

Route::get('/doimatkhau', [UsersChangeController::class, 'doimatkhau'])->name('doimatkhau');

Route::get('/suathongtin', [UsersChangeController::class, 'suathongtin'])->name('suathongtin');

Route::get('/xacnhan/{id}', [AdminController::class, 'xacnhankhoa'])->name('xacnhan');

Route::get('/khoanguoidung/{id}', [AdminController::class, 'khoanguoidung'])->name('khoanguoidung');

Route::get('/index', [AdminController::class, 'index'])->name('index');

Route::get('/formmatkhau.admin', [AdminController::class, 'formmatkhau'])->name('formmatkhau.admin');

Route::get('/formthongtin.admin', [AdminController::class, 'formthongtin'])->name('formthongtin.admin');

Route::post('/doimatkhau.admin', [AdminController::class, 'doimatkhau'])->name('doimatkhau.admin');

Route::post('/suathongtin/{id}.admin', [AdminController::class, 'suathongtin'])->name('suathongtin.admin');

Route::get('/searchuser', [AdminController::class, 'search'])->name('searchuser');

Route::get('/dangxuatnguoidung', function () {

    return view('frontend.users.dangxuat');
})->name('dangxuatnguoidung');
Route::get('/dangxuat.admin', function () {

    return view('quanly.dangxuat');
})->name('dangxuat.admin');
Route::get('/gioithieu', function () {

    return view('menu.gioithieu');
})->name('gioithieu');

Route::get('/doimatkhaunguoidung', [UsersChangeController::class, 'formdoimatkhau'])->name('doimatkhaunguoidung');
Route::get('/suathongtinnguoidung', [UsersChangeController::class, 'formsuathongtin'])->name('suathongtinnguoidung');
Route::get('/dangkinguoidung', [UsersChangeController::class, 'formdangki'])->name('dangkinguoidung');
Route::post('/dangki', [UsersChangeController::class, 'dangki'])->name('dangki');
Route::post('/danganh', [UsersChangeController::class, 'danganh'])->name('danganh');
Route::get('/danganhnguoidung', [UsersChangeController::class, 'formdanganh'])->name('danganhnguoidung');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
