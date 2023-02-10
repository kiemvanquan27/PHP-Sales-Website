<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;

class LoginadController extends Controller
{

    public function index(){

        return view('auth.auth_admin.login');
    }
    public function store(LoginRequest $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        
        if (Auth::guard('web')->attempt($arr)) {
            $user = Auth::user();
            if ($user->is_admin === 'true') {
                return view('dashboard_admin');
                
            } else {
                Session::flash('success', 'Người dùng không tồn tại');
                Auth::guard('web')->logout();
                return view('auth.auth_admin.login');}
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {
            Session::flash('success', 'Người dùng không tồn tại');
            return view('auth.auth_admin.login');
        }
        
        
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
       
}
