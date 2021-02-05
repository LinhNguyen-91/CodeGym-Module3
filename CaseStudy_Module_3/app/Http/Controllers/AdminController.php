<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Type;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller

{

    public function search(Request $request, $email = '', $tinhTrang = '')
    {

        if (session('user') === null) {
            return view('quanly.dangnhap');
        }
        $email = $request->email;
        $tinhTrang = ($request->tinhtrang) ? $request->tinhtrang : session('search');
        session(['search' => $tinhTrang]);
        // dd(session('search'));
        // dd($tinhTrang);
        $users = Admin::where('admin', 0)
            ->where('email', 'LIKE', "%$email%")
            ->where('tinh_trang', 'LIKE', "%$tinhTrang%")
            ->paginate(6);

        return view('quanly.nguoidung', compact('users'));
    }
    public function index()
    {
        if (session('user') === null) {
            return view('quanly.dangnhap');
        }
        $users = Admin::where('admin', 0)
            ->paginate(6);

        return view('quanly.nguoidung', compact('users'));
    }

    public function dangnhap(Request $request)
    {
        $data = $request->all();
        $rules = [
            'email' => 'bail|required|email',
            'matkhau' => 'bail|required|min:5|max:12'
        ];
        $messages = [
            'email.required' => '* email không được để trống',
            'matkhau.required' => '* mật khẩu không được để trống',
            'email.email' => '* email không hợp lệ',
            'matkhau.min' => '* mật khẩu phải lớn hơn 5 kí tự',
            'matkhau.max' => '* mật khẩu không được vượt 12 kí tự'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/dangnhap')
                ->withErrors($validator)
                ->withInput();
        }
        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->matkhau, $user->mat_khau)) {
                session(['user' => $user->email]);
                session(['id' => $user->id]);
                session(['hinhanh' => $user->hinh_anh]);
                return redirect('/users');
            } else {
                return back()->with('fail', 'Sai mật khẩu !');
            }
        } else {
            return back()->with('fail', 'Email không đúng !');
        }

        // $email = $request->email;
        // $pass = $request->matkhau;
        // $user = Admin::where('email', $email)
        //     ->where('mat_khau', $pass)
        //     ->get();
        // if (count($user) == 0) {
        //     $request->session()->flash('error', 'Email hoặc mật khẩu không đúng!');
        //     return redirect('dangnhap');
        // }
        // $nguoiDung = $user[0]['email'];
        // $matKhau = $user[0]['mat_khau'];
        // $hoTen = $user[0]['ho_ten'];
        // $dienThoai = $user[0]['dien_thoai'];
        // $diaChi = $user[0]['dia_chi'];
        // $ngaySinh = $user[0]['nam_sinh'];
        // $hinhAnh = $user[0]['hinh_anh'];

        // $id = $user[0]['id'];

        // if (($email ==  $nguoiDung) and ($pass == $matKhau)) {
        //     session(['user' => $nguoiDung]);
        //     session(['id' => $id]);
        //     session(['hoten' => $hoTen]);
        //     session(['dienthoai' => $dienThoai]);
        //     session(['diachi' => $diaChi]);
        //     session(['ngaysinh' => $ngaySinh]);
        //     session(['hinhanh' => $hinhAnh]);

        //     return redirect('/users');
        // }

        // return view('frontend.users.dangnhap');
    }
    public function quanly(Request $request)
    {

        $data = $request->all();

        $rules = [
            'email' => 'required|exists:danh_sach_nguoi_dung',
            'matkhau' => 'required|min:5'
        ];
        $messages = [
            'email.required' => 'Email không được để trống',
            'email.exists' => 'Email không hợp lệ',
            'matkhau.required' => 'Mật khẩu không được để trống',
            'matkhau.min' => 'Mật khẩu tối thiểu 5 kí tự'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/dangnhapquanly')
                ->withErrors($validator)
                ->withInput();
        }
        $user = Admin::where('email', $request->email)
            ->where('admin', 1)
            ->first();
        if ($user) {
            if (Hash::check($request->matkhau, $user->mat_khau)) {
                session(['user' => $user->email]);
                session(['hinhanh' => $user->hinh_anh]);
                return redirect('/index');
            } else {
                return back()->with('fail', 'Sai mật khẩu !');
            }
        } else {
            return back()->with('fail', 'Email không đúng !');
        }
        // $email = $request->email;
        // $pass = $request->matkhau;
        // $user = Admin::where('email', $email)
        //     ->where('mat_khau', $pass)
        //     ->where('admin', 1)
        //     ->get();

        // if (count($user) == 0) {
        //     $request->session()->flash('error', 'Email hoặc mật khẩu không đúng!');
        //     return redirect('dangnhapquanly');
        // }

        // $quanLy = $user[0]['email'];
        // $matKhau = $user[0]['mat_khau'];
        // session(['user' => $quanLy]);

        // $users = Admin::where('admin', 0)
        //     ->get();
        // return view('quanly.nguoidung', compact('users'));
    }
    public function khoanguoidung($id)
    {
        $user = Admin::find($id);

        $tinhTrang = ($user->tinh_trang === '4a1') ? '4a2' : '4a1';
        $user->tinh_trang = $tinhTrang;
        $user->save();
        return back()->with('fail', 'Thực hiện khóa thành công !');
    }
    public function dangxuatquanly()
    {
        session()->flush();
        return view('quanly.dangnhap');
    }
    public function formmatkhau()
    {
        if (session('user') === null) {
            return view('quanly.dangnhap');
        }
        return view('quanly.doimatkhau');
    }
    public function formthongtin()
    {
        if (session('user') === null) {
            return view('quanly.dangnhap');
        }
        $user = Admin::where('email', session('user'))
            ->get();
        $id = $user[0]['id'];
        $user = Admin::find($id);

        return view('quanly.suathongtin', compact('user'));
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
            'email.exists'=>'* người dùng không tồn tại',
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
            return redirect('/formmatkhau.admin')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Admin::where('email', $request->email)
        ->where('admin', 1)
        ->where('tinh_trang', '4a1')
        ->first();
    if ($user) {
        if (Hash::check($request->matkhaucu, $user->mat_khau)) {
            $user->mat_khau =bcrypt($request->matkhaumoi);
            $user->save();
            $request->session()->flash('success', 'Cập nhật mật khẩu thành công !');
            return redirect('/index');
        } else {
            return back()->with('fail', 'Sai mật khẩu !');
        }
    } else {
        return back()->with('fail', 'Email không đúng !');
    }
        // $email = $request->email;
        // $pass = $request->matkhaucu;
        // $passMoi = $request->matkhaumoi;
        // $passNhaplai = $request->nhaplai;

        // $user = Admin::where('email', $email)
        //     ->where('admin', 1)
        //     ->where('mat_khau', $pass)
        //     ->get();
        // if (count($user) === 0) {
        //     return redirect('/formmatkhau.admin');
        // }

        // $id = $user[0]['id'];
        // $nguoiDung = Admin::find($id);
        // if ($passMoi === $passNhaplai) {
        //     $nguoiDung->mat_khau = $passMoi;
        //     $nguoiDung->save();
        //     $request->session()->flash('success', 'Cập nhật mật khẩu thành công !');
        //     return redirect('/index');
        // }
    }
    public function suathongtin(Request $request, $id)
    {
       
        $user = Admin::find($id);

        $user->ho_ten = $request->hoten;
        $user->dien_thoai = $request->dienthoai;
        $user->dia_chi = $request->diachi;
        $user->nam_sinh = $request->ngaysinh;
        $user->save();
        $request->session()->flash('success', 'Cập nhật thông tin thành công !');
        return redirect('/index');
    }
}
