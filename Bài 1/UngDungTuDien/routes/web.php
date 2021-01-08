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
    return view('ungdungtudien');
});

// Route::get('/ungdungtudien', [UserController::class, 'tudien'])

Route::post(
    '/ungdungtudien',
    function (Illuminate\Http\Request $request) {
        $tiengAnh = $request->tienganh;
        $ketQua = '';

        $tuDien = array(
            "hello" => "xin chào",
            "how" => "thế nào",
            "book" => "quyển vở",
            "computer" => "máy tính"
        );
        foreach ($tuDien as $tu => $nghia) {
            if ($tiengAnh == $tu) {
                $ketQua = $nghia;
                return view('ketqua', compact(['ketQua']));
            }
        }
        $ketQua = 'không tìm thấy';
        return view('ketqua', compact(['ketQua']));
    }
);
