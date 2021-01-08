<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('tinhchietkhau');
});
Route::post(
    '/tinhchietkhau',
    function (Illuminate\Http\Request $request) {
        $ten = $request->tensanpham;
        $gia = $request->gia;
        $tyle = $request->tyle;
        $chietKhau =$gia * $tyle * 0.1;
        $conLai = number_format($gia - $chietKhau);

        return view('ketqua', compact(['ten', 'gia', 'chietKhau', 'conLai']));
    }
);
