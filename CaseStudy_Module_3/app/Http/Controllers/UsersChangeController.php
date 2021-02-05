<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Type;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class UsersChangeController extends Controller
{
    public function dangxuat()
    {
        if (session('user') === null) {
            return view('frontend.users.dangnhap');
        }
        session()->flush();
        return view('frontend.users.dangnhap');
    }
    public function doimatkhau(Request $request)
    {

        $data = $request->all();

        $rules = [
            'email' => 'bail|required|email|exists:danh_sach_nguoi_dung',
            'matkhaucu' => 'bail|required|',
            'matkhaumoi' => 'bail|required|min:5|max:12|confirmed',
            'matkhaumoi_confirmation' => "bail|required|"
        ];
        $messages = [
            'email.required' => '* email không được để trống',
            'email.exists' => '* người dùng không tồn tại',
            'matkhaucu.required' => '* vui lòng nhập mật khẩu hiện tại',
            'matkhaumoi.required' => '* vui lòng nhập mật khẩu mới',
            'email.email' => '* email không hợp lệ',
            'matkhaumoi.min' => '* mật khẩu phải lớn hơn 5 kí tự',
            'matkhaumoi.max' => '* mật khẩu không được vượt 12 kí tự',
            'matkhaumoi_confirmation.required' => '* không được để trống trường này',
            'matkhaumoi.confirmed' => '* mật khẩu không trùng nhau'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/doimatkhaunguoidung')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Admin::where('email', $request->email)
            ->where('tinh_trang', '4a1')
            ->first();
        if ($user) {
            if (Hash::check($request->matkhaucu, $user->mat_khau)) {
                $user->mat_khau = bcrypt($request->matkhaumoi);
                $user->save();
                $request->session()->flash('success', 'Cập nhật mật khẩu thành công !');
                return redirect('/users');
            } else {
                return back()->with('fail', 'Sai mật khẩu !');
            }
        } else {
            return back()->with('fail', 'Email không đúng !');
        }
    }
    public function suathongtin(Request $request)
    {
        $id = session('id');

        $user = Admin::find($id);
        $user->ho_ten = $request->hoten;
        $user->dien_thoai = $request->dienthoai;
        $user->dia_chi = $request->diachi;
        $user->nam_sinh = $request->ngaysinh;
        $user->save();
        $request->session()->flash('success', 'Cập nhật thông tin thành công !');
        return redirect('/users');
    }
    public function formdoimatkhau()
    {
        if (session('user') === null) {
            session()->flash('fail', 'Bạn chưa đăng nhập !');
            return view('frontend.users.dangnhap');
        }

        $id = session('id');
        $types = Type::where('ma_nguoi_dung', $id)
            ->get();
        return view('frontend.users.doimatkhau', compact('types'));
    }
    public function formsuathongtin()
    {
        if (session('user') === null) {
            session()->flash('fail', 'Bạn chưa đăng nhập !');
            return view('frontend.users.dangnhap');
        }

        $id = session('id');
        $types = Type::where('ma_nguoi_dung', $id)
            ->get();
        $user = Admin::find($id);
        return view('frontend.users.suathongtin', compact('types', 'user'));
    }
    public function formdangki()
    {
        return view('frontend.users.dangki');
    }
    public function dangki(Request $request)
    {
        $data = $request->all();

        $rules = [
            'email' => 'bail|required|email|unique:danh_sach_nguoi_dung,email',
            'hoten' => 'bail|required|min:5',
            'matkhau' => 'bail|required|min:5|max:12|confirmed',
            'matkhau_confirmation' => "bail|required|"
        ];
        $messages = [
            'email.required' => '* email không được để trống',
            'email.unique' => '* email đã được đăng kí',
            'hoten.required' => '* vui lòng nhập họ tên',
            'hoten.min' => '* vui lòng nhập trên 5 kí tự',
            'matkhau.required' => '*  không được để trống trường này',
            'email.email' => '* email không hợp lệ',
            'matkhau.min' => '* mật khẩu phải lớn hơn 5 kí tự',
            'matkhau.max' => '* mật khẩu không được vượt 12 kí tự',
            'matkhau_confirmation.required' => '* không được để trống trường này',
            'matkhau.confirmed' => '* mật khẩu không trùng nhau'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/dangkinguoidung')
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->email;
        $matKhau = $request->matkhau;

        $hoTen = $request->hoten;
        $dienThoai = $request->dienthoai;
        $diaChi = $request->diachi;
        $namSinh = $request->ngaysinh;

        if ($request->file) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        $user = new Admin();
        $user->email = $email;
        $user->ho_ten = $hoTen;
        $user->mat_khau = bcrypt($matKhau);
        $user->dien_thoai = $dienThoai;
        $user->dia_chi = $diaChi;
        $user->nam_sinh = $namSinh;
        $user->hinh_anh = $imageName;
        $user->tinh_trang = '4a1';
        $user->admin = 0;
        $user->save();
        $request->session()->flash('success', 'Đăng kí thành công !');
        return  view('frontend.users.dangnhap');
    }
    public function danganh(Request $request)
    {

        if ($request->file) {
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $imageName);
        } else {
            $request->session()->flash('fail', 'Bạn chưa chọn ảnh !');
            return view('frontend.users.danganh');
        }
        $id = session('id');
        $user = Admin::find($id);
        $user->hinh_anh = $imageName;
        $user->save();
        session(['hinhanh'=>$user->hinh_anh]);
        $request->session()->flash('success', 'Thay đổi ảnh thành công !');
        return redirect('/users');
    }
    public function formdanganh()
    {
        return view('frontend.users.danganh');
    }
}
