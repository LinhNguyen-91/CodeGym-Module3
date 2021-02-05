<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Type;

class SearchController extends Controller

{
    public function search(Request $request, $tieuDe = '', $phanLoai = '', $ngayThang = '', $hienThi = 1)
    {
        $tieuDe = $request->tieude;
        $ngayThang = $request->ngaythang;
        $phanLoai = ($request->phanloai) ? $request->phanloai : session('search');
        if ($phanLoai < 0) {
            $phanLoai = null;
        } elseif ($phanLoai > 0) {
            $phanLoai = $phanLoai;
        } else {
            $phanLoai = session('search');
        }
        session(['search' => $phanLoai]);
        $notes = Note::Join('phan_loai', 'phan_loai', '=', 'phan_loai.id')
            ->select('danh_sach_ghi_chu.*', 'phan_loai.chu_de')
            ->where('danh_sach_ghi_chu.tieu_de', 'LIKE', "%$tieuDe%")
            ->where('phan_loai.id', 'LIKE', "%$phanLoai%")
            ->where('danh_sach_ghi_chu.ngay_gio', 'LIKE', "%$ngayThang%")
            ->where('hien_thi', "$hienThi")
            ->paginate(6);
        $types = Type::where('ma_nguoi_dung', session('id'))
            ->get();
        // if (session('search') == null) {
        //     session(['tim' => 'Tất Cả']);
        // } else {
        //     $type =  Type::find(session('search'));
        //     session(['tim' => $type->chu_de]);
        // }
        return view('frontend.users.index', compact('notes', 'types'));
    }
    public function searchdelete(Request $request, $tieuDe = '', $hienThi = 2)
    {
        $tieuDe = $request->tieude;

        $notesDelete = Note::where('danh_sach_ghi_chu.tieu_de', 'LIKE', "%$tieuDe%")
            ->where('hien_thi', "$hienThi")
            ->paginate(12);
        return view('frontend.notesDelete.index', compact('notesDelete'));
    }
}
