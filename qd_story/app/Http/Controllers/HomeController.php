<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        $user = User::orderBy('id','DESC')->get();
            return view('pages.home')->with(compact('danhmuc','sanpham','user'));
    
    }
    public function admin()
    {
        $user = Auth::user();
        $this->authorize('view_admin', $user);
        $khachhang = User::orderBy('id','DESC')->get();
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
            return view('dashboard_admin')->with(compact('danhmuc','sanpham','khachhang'));
    
    }
    
    
}
