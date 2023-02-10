<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Models\Danhmucsanpham;
use App\Models\Sanpham;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create(){
        return view('auth.auth_admin.regsiter');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required',
            'address' => 'required',
            'is_admin' => 'required',
            'is_active' => 'required',
            'is_delete' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
            'is_active' => $request->is_active,
            'is_delete' => $request->is_delete,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return view('auth.auth_admin.login');
    }
    
}
