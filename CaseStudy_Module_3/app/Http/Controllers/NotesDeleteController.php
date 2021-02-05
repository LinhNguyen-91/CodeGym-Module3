<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Note;

class NotesDeleteController extends Controller
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
        $notesDelete = Note::where('hien_thi', 2)->where('user', $id)
            ->Join('phan_loai', 'phan_loai', '=', 'phan_loai.id')
            ->select('danh_sach_ghi_chu.*', 'phan_loai.chu_de')
            ->paginate(6);
        $types = Type::where('ma_nguoi_dung', session('id'))
            ->get();

        return view('frontend.notesdelete.index', compact('notesDelete', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $note = Note::find($id);
        return view('frontend.notesdelete.restore', compact('id', 'note'));
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
        $note = Note::find($id);
        $note->hien_thi = 1;
        $note->save();
        $request->session()->flash('success', 'Phục hồi ghi chú thành công !');
        return redirect(session('trang'));
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
