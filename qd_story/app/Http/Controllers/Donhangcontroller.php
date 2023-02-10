<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donhang;
use App\Models\Sanpham;
use App\Models\Danhmucsanpham;
use App\Models\giohang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Donhangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    { 
        $user = Auth::user();
        $this->authorize('view_admin', $user);
        //$user = User::orderby('id','DESC')->where('id',)->get();
        $danhsachdonhang = donhang::with('User')->orderby('id','DESC')->get();
        //$id_sanpham = donhang::orderBy('id','DESC')->pluck('id_sanpham');
        $donhang = donhang::orderby('id','DESC')->first();
        $id_sanpham = explode(",",$donhang->id_sanpham);
        $sanpham = giohang::groupBy('id')->whereIn('id_sanpham',$id_sanpham)->get();
       

        return view('adminqd.donhang.index')->with(compact('donhang','sanpham','danhsachdonhang')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminqd.donhang.create'); 
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $id = rand(01,1000);
        $cart = Giohang::groupBy('id')->where('id_user',$user->id)->get();
        $data = $request->validate([
            'is_active' => 'required',
            'is_delete' => 'required',
            'is_complete' => 'required',
            'created_at' => 'required',
           ]);
          $sanpham = trim( $cart->pluck('id_sanpham'), '[] "');
        //dd($sanpham);
        $data['id_sanpham']  =  $sanpham;
        $data['code_order']  = 'QD'.$id.'VN' ;
        $data['soluong'] = $cart->sum('soluong');
        $data['gia_tong'] =  $cart->sum('gia_tong');
        $data['id_user'] =   $user->id;
        $data['thanh_tien'] = $cart->sum('gia_tong');
          //dd($data);
        $danhsachdonhang = new Donhang();
        $danhsachdonhang->id_sanpham = $data['id_sanpham'];
        $danhsachdonhang->gia_tong = $data['gia_tong'];
        $danhsachdonhang->thanh_tien = $data['thanh_tien'];
        $danhsachdonhang->id_user = $data['id_user'];
        $danhsachdonhang->soluong = $data['soluong'];
        $danhsachdonhang->code_order = $data['code_order'];
        $danhsachdonhang->is_active = $request->is_active;
        $danhsachdonhang->is_delete = $request->is_delete;
        $danhsachdonhang->created_at = $request->created_at;
        $danhsachdonhang->is_complete = $request->is_complete;
       //dd($danhsachdonhang);
        $danhsachdonhang->save();


        return redirect('donhang/{id}'); 
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

        $user = Auth::user();
        $this->authorize('view_admin', $user);
         $danhsachdonhang = donhang::with('User')->orderby('id','DESC')->where('id',$id)->get();
         $donhang = donhang::orderby('id','DESC')->where('id',$id)->first();
         $id_sanpham = explode(",",$donhang->id_sanpham);
         $sanpham = giohang::groupBy('id')->where('id_user',$donhang->User->id)->whereIn('id_sanpham',$id_sanpham)->get();
        return view('adminqd.donhang.chitiet')->with(compact('danhsachdonhang','sanpham','donhang')); 
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
        $user = Auth::user();
        $this->authorize('view_admin', $user);
        $data = $request->validate([
            'is_complete'=> 'required'
        ]);
        $danhsachdonhang = Donhang::find($id); 
        $danhsachdonhang->is_complete = $request->is_complete;
        $danhsachdonhang->save();
        $danhsachdonhang = donhang::with('User')->orderby('id','DESC')->where('id',$id)->get();
         $donhang = donhang::orderby('id','DESC')->where('id',$id)->first();
         $id_sanpham = explode(",",$donhang->id_sanpham);
         $sanpham = giohang::groupBy('id')->where('id_user',$donhang->User->id)->whereIn('id_sanpham',$id_sanpham)->get();
        return view('adminqd.donhang.chitiet')->with(compact('danhsachdonhang','sanpham','donhang')); 
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
