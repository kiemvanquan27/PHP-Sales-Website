<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use App\Models\donhang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\giohang;


class Index extends Controller
{
    public function home()
    {
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        $giohang = Giohang::orderBy('id','DESC')->get();
        $user = User::orderBy('id','DESC')->get();
        return view('.pages.home')->with(compact('danhmuc','sanpham','user','giohang')); 
    }
    public function product($id)
    {
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->where('id',$id)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        $giohang = Giohang::orderBy('id','DESC')->get();
        $user = User::orderBy('id','DESC')->get();
        return view('.pages.product')->with(compact('danhmuc','sanpham','user','giohang'));  
    }
    public function donhang()
    {
        
        $user = Auth::user();
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        $donhang = donhang::with('User')->orderby('id','DESC')->where('id_user',$user->id)->get();
        $sanpham = Sanpham::orderBy('id','DESC')->get();
        return view('.pages.order.index')->with(compact('danhmuc','sanpham','user','donhang'));  
    }
    public function chitiet($id)
    {
        $user = Auth::user();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        $danhsachdonhang = donhang::with('User')->orderby('id','DESC')->get();
        $donhang = donhang::orderby('id','DESC')->where('id_user',$user->id)->where('id',$id)->first();
        $id_sanpham = explode(",",$donhang->id_sanpham);
        $sanpham = giohang::groupBy('id')->where('id_user',$user->id)->whereIn('id_sanpham',$id_sanpham)->get();
        $giohang = Giohang::orderBy('id','DESC')->get();

        //dd($donhang);

        return view('.pages.order.order_details')->with(compact('danhmuc','sanpham','user','donhang','danhsachdonhang','giohang'));  
    }
    public function profiles()
    {
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        $giohang = Giohang::orderBy('id','DESC')->get();
        $user = Auth::user();
        $thongtin = User::orderBy('id','DESC')->where('id',$user->id)->get();
        $donhang = donhang::with('User')->orderby('id','DESC')->where('id_user',$user->id)->get();
        $sanpham = Sanpham::orderBy('id','DESC')->get();
        //dd($user);
       return view('.pages.profiles.profiles')->with(compact('danhmuc','sanpham','giohang','user','thongtin','donhang'));
    }
    
}