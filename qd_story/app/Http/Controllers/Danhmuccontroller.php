<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;

class Danhmuccontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmucsanpham = Danhmucsanpham::orderby('id','DESC')->get();
        return view('adminqd.danhmucsanpham.index')->with(compact('danhmucsanpham')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminqd.danhmucsanpham.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $data = $request->validate([
            'tendanhmuc'=> 'required|unique:danhmuc|max:255',
            'mota'=> 'required|max:255',
            'kichhoat'=> 'required'
        ]);

         $danhmucsanpham = new Danhmucsanpham();
         $danhmucsanpham->tendanhmuc = $data['tendanhmuc'];
         $danhmucsanpham->mota = $data['mota'];
         $danhmucsanpham->kichhoat = $data['kichhoat'];
         $danhmucsanpham->save();
         $danhmucsanpham = Danhmucsanpham::orderby('id','DESC')->get();
         return view('adminqd.danhmucsanpham.index')->with(compact('danhmucsanpham')); 
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
       $danhmuc = Danhmucsanpham::find($id);
       return view('adminqd.danhmucsanpham.edit')->with(compact('danhmuc'));
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
        
        $data = $request->validate([
            'tendanhmuc'=> 'required|unique:danhmuc|max:255',
            'mota'=> 'required|max:255',
            'kichhoat'=> 'required'
        ]);

         $danhmucsanpham =  Danhmucsanpham::find($id); 
         $danhmucsanpham->tendanhmuc = $data['tendanhmuc'];
         $danhmucsanpham->mota = $data['mota'];
         $danhmucsanpham->kichhoat = $data['kichhoat'];
         $danhmucsanpham->save();
         return redirect('danhmuc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Danhmucsanpham::find($id)->delete();
       return redirect('danhmuc')->with('status', 'ĐÃ XOÁ THÀNH CÔNG');

    }
}
