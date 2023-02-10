<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Danhmucsanpham;

class Sanphamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachsanpham = Sanpham::with('danhmucsanpham')->orderby('id','DESC')->get();
        //dd($danhsachsanpham);
        return view('adminqd.sanpham.index')->with(compact('danhsachsanpham')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmucsanpham = Danhmucsanpham::orderby('id','DESC')->get();
        //dd($danhsachsanpham);
        return view('adminqd.sanpham.create')->with(compact('danhmucsanpham'));
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
            'tensanpham'=> 'required|unique:sanpham|max:255',
            'motasanpham'=> 'required',
            'hinhanh' => ['required', 'image'],
            //'hinhanh'=> 'required|image|mimes:jpg,png,jpeg,gif,vsg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'id_danhmuc'=> 'required|max:255',
            'size'=> 'required|max:255',
            'gia'=> 'required|max:255',
            'mau'=> 'max:255',
            'soluong'=> 'required|max:255',
            'kichhoat'=> 'required'
        ]);

         $danhsachsanpham = new Sanpham();
         $danhsachsanpham->tensanpham = $data['tensanpham'];
         $danhsachsanpham->motasanpham  = $data['motasanpham'];
         $danhsachsanpham->id_danhmuc  = $data['id_danhmuc'];

         $get_image = $request->hinhanh;
         $path ='public/uploads/hinhanh';
         $get_name_image = $get_image->getClientOriginalName();
         $name_image = current(explode('.',$get_name_image));
         $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
         $get_image->move($path,$new_image);
         $danhsachsanpham->hinhanh = $new_image;


         $danhsachsanpham->size  = $data['size'];
         $danhsachsanpham->gia  = $data['gia'];
         $danhsachsanpham->mau = $data['mau'];
         $danhsachsanpham->soluong  = $data['soluong'];
         $danhsachsanpham->kichhoat = $data['kichhoat'];
         $danhsachsanpham->save();
         $danhsachsanpham = Sanpham::orderby('id','DESC')->get();
         return view('adminqd.sanpham.index')->with(compact('danhsachsanpham')); 
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
        
        $sanpham = Sanpham::find($id);
        $danhmucsanpham = Danhmucsanpham::orderby('id','DESC')->get();
       return view('adminqd.sanpham.edit')->with(compact('sanpham','danhmucsanpham'));
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
            'tensanpham'=> 'required|unique:sanpham|max:255',
            'motasanpham'=> 'required',
            'hinhanh' => ['required', 'image'],
            'id_danhmuc'=> 'required|max:255',
            'size'=> 'required|max:255',
            'gia'=> 'required|max:255',
            'mau'=> 'required|max:255',
            'soluong'=> 'required|max:255',
            'kichhoat'=> 'required'
        ]);

         $danhsachsanpham = sanpham::find($id); 
         $danhsachsanpham->tensanpham = $data['tensanpham'];
         $danhsachsanpham->motasanpham  = $data['motasanpham'];
         $danhsachsanpham->id_danhmuc  = $data['id_danhmuc'];

         $get_image = $request->hinhanh;
         $path ='public/uploads/hinhanh';
         $get_name_image = $get_image->getClientOriginalName();
         $name_image = current(explode('.',$get_name_image));
         $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
         $get_image->move($path,$new_image);
         $danhsachsanpham->hinhanh = $new_image;

         $danhsachsanpham->size  = $data['size'];
         $danhsachsanpham->gia  = $data['gia'];
         $danhsachsanpham->mau = $data['mau'];
         $danhsachsanpham->soluong  = $data['soluong'];
         $danhsachsanpham->kichhoat = $data['kichhoat'];
         $danhsachsanpham->save();
         return redirect('sanpham')->with('status', 'ĐÃ CHỈNH SỬA THÀNH CÔNG');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sanpham::find($id)->delete();
       return redirect('sanpham')->with('status', 'ĐÃ XOÁ THÀNH CÔNG');
    }
}
