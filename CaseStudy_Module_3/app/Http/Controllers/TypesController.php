<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Validator;

class TypesController extends Controller
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

        $types = Type::where('ma_nguoi_dung', session('id'))
            ->get();
        return view('frontend.users.types.index', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.users.types.create');
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
            'chude' => 'bail|required|unique:phan_loai,chu_de',

        ];
        $messages = [
            'chude.required' => '* Trường chủ đề không được để trống ',

            'chude.unique' => '* Chủ đề đã tồn tại ',

        ];
        
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
          
            return redirect('types/create')
                ->withErrors($validator)
                ->withInput();
        }
             
            $type = new Type();
            $type->ma_nguoi_dung = $request->iduser;
            $type->chu_de = $request->chude;
            $type->mieu_ta = $request->mieuta;
            $type->save();
            $request->session()->flash('success', 'Thêm chủ đề thành công !');
          
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
        $id = $id;
        $type = Type::find($id);
        return view('frontend.users.types.destroy', compact('id', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::find($id);

        return view('frontend.users.types.edit', compact('id', 'types'));
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
        $type = Type::find($id);
        $type->chu_de = $request->chude;
        $type->mieu_ta = $request->mieuta;
        $type->save();
        $request->session()->flash('success', 'Cập nhật chủ đề thành công !');
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
        session()->flash('success', 'Xóa chủ đề thành công !');
        return $this->index();
    }
}
