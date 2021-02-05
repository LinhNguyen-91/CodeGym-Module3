<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Type;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session('user') === null) {
            session()->flash('fail', 'Bạn chưa đăng nhập !');
            return view('frontend.users.dangnhap');
        }
        $data = $request->all();

        $rules = [
            'email' => 'bail|required|email|exists:danh_sach_nguoi_dung',
        ];
        $messages = [
            'email.required' => '* email không được để trống',
            'email.exists'=>'* người dùng không tồn tại',
            'email.email' => '* email không hợp lệ',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/friends/create')
                ->withErrors($validator)
                ->withInput();
        }
        $email = $request->email;
        $user = Admin::where('email', $email)
            ->first();
       
        $id = $user->id;

        $notesFriend = Note::where('trang_thai', 1)
            ->where('user', $id)
            ->where('hien_thi', 1)
            ->Join('phan_loai', 'phan_loai', '=', 'phan_loai.id')
            ->select('danh_sach_ghi_chu.*', 'phan_loai.chu_de')
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('frontend.users.ds_friends', compact('notesFriend', 'email'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('user') === null) {
            return view('frontend.users.dangnhap');
        }

        return view('frontend.users.search_friends');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
