<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\giohang;
use App\Models\Danhmucsanpham;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class GiohangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $user = Auth::user();
        $id = $user->id;
        $cart = Giohang::orderBy('id','DESC')->where('id_user',$user->id)->get();
        $giohang = Giohang::orderBy('id','DESC')->where('id_user',$user->id)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->where('id',$id)->get();
        $khachhang = User::orderBy('id','DESC')->get();
        return view('pages.cart.show_cart')->with(compact('sanpham','danhmuc','giohang','khachhang','cart'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $product = $request->id_sanpham;
            $quatity = $request->soluong;
            $product_info = Sanpham::where('id',$product)->first();
            $danhmuc = Danhmucsanpham::orderBy('id','DESC')->first();
            $user = Auth::user();
            $data = $request->validate([
                'is_active' => 'required',
               ]);

           $data['id'] =  $product_info->id;
           $data['tensanpham'] =  $product_info->tensanpham;
           $data['gia'] =  $product_info->gia;
           $data['mau'] =  $product_info->mau;
           $data['size'] =  $product_info->size;
           $data['hinhanh'] =  $product_info->hinhanh;
           $data['id_danhmuc'] =  $danhmuc->id;
           $data['gia_tong'] =  $product_info->gia * $quatity;
           $data['id_user'] =   $user->id;
           $data['thanh_tien'] =  $user->id;
           
    
        $giohang = new Giohang();
        $giohang->is_active = $request->is_active;
        $giohang->tensanpham = $data['tensanpham'];
        $giohang->id_danhmuc  = $data['id_danhmuc'];
        $giohang->id_sanpham = $product;
        $giohang->hinhanh = $data['hinhanh'];
        $giohang->size  = $data['size'];
        $giohang->gia  = $data['gia'];
        $giohang->mau = $data['mau'];
        $giohang->soluong  = $quatity;
        $giohang->gia_tong = $data['gia_tong'];
        $giohang->id_user = $data['id_user'];
        $giohang->save(); 

        return redirect('/giohang/{id}');  
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
        Giohang::find($id)->delete();
        Session::flash('success', 'Đã Xoá Sản Phẩm');
        return redirect('/giohang/{id}');
    }
}
