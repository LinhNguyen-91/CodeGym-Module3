<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\Note;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (session('user') === null) {
            session()->flash('fail', 'Bạn chưa đăng nhập !');
            return view('frontend.users.dangnhap');
        }

        $id = session('id');
        $notes = Note::where('hien_thi', 1)
            ->where('user', $id)
            ->Join('phan_loai', 'phan_loai', '=', 'phan_loai.id')
            ->select('danh_sach_ghi_chu.*', 'phan_loai.chu_de')
            ->orderBy('id', 'desc')
            ->paginate(6);


        $types = Type::where('ma_nguoi_dung', $id)
            ->get();

        return view('frontend.users.index', compact('notes', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('user') === null) {
            session()->flash('fail', 'Bạn chưa đăng nhập !');
            return view('frontend.users.dangnhap');
        }

        $id = session('id');
        $types = Type::where('ma_nguoi_dung', $id)
            ->get();

        return view('frontend.users.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'tieude' => 'bail|required|max:100',
            'noidung' => 'bail|required|max:250'
        ];
        $messages = [
            'tieude.required' => '* tiêu đề không được để trống',
            'tieude.max' => '* tiêu đề không được vượt 100 kí tự',
            'noidung.required' => '* nội dung không được để trống',
            'noidung.max' => '* nội dung tối đa 250 kí tự'
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/users/create')
                ->withErrors($validator)
                ->withInput();
        }
        $note = new Note();
        $note->user = $request->iduser;
        $note->tieu_de = $request->tieude;
        $note->noi_dung = $request->noidung;
        $note->phan_loai = $request->phanloai;
        $ngayThang = getdate();
        $note->ngay_gio = $ngayThang['year'] . '-' . $ngayThang['mon'] . '-' . $ngayThang['mday'];
        $note->trang_thai = $request->trangthai;
        $note->hien_thi = $request->hienthi;
        $note->save();
        $request->session()->flash('success', 'Thêm ghi chú thành công !');
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (session('user') === null) {
            return view('frontend.users.dangnhap');
        }

        $note = Note::find($id);
        return view('frontend.users.destroy', compact('id', 'note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::where('ma_nguoi_dung', session('id'))
            ->get();
        $notes = Note::find($id);

        return view('frontend.users.edit', compact('id', 'notes', 'types'));
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

        $note = Note::find($id);
        $note->tieu_de = $request->tieude;
        $note->noi_dung = $request->noidung;
        $note->phan_loai = $request->phanloai;
        $note->trang_thai = $request->trangthai;
        $note->save();
        $request->session()->flash('success', 'Cập nhật ghi chú thành công !');
        return   redirect(session('trang'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $note = Note::find($id);
        $note->hien_thi = 2;
        $note->save();
        $request->session()->flash('success', 'Xóa ghi chú thành công !');
        return   redirect(session('trang'));
    }
}
