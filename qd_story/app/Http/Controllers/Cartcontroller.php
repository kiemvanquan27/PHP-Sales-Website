<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\giohang;
use App\Models\Danhmucsanpham;
use Cart;

class Cartcontroller extends Controller
{
    public function save_cart(Request $request){
            $product = $request->idsanpham_hidden;
            $quatity = $request->qty;

            $product_info = Sanpham::where('id',$product)->first();

           $data['id'] =  $product_info->id;
           $data['qty'] = $quatity;
           $data['name'] =  $product_info->tensanpham;
           $data['price'] =  $product_info->gia;
           $data['weight'] =  $product_info->gia;
           $data['options']['size'] =  $product_info->size;
           $data['options']['hinhanh'] =  $product_info->hinhanh;
           Cart::add($data);
           return redirect('/show_cart');

            
    }
    public function show_cart(){
        $sanpham = Sanpham::orderBy('id','DESC')->where('kichhoat',0)->get();
        $danhmuc = Danhmucsanpham::orderBy('id','DESC')->get();
        return view('pages.cart.show_cart')->with(compact('danhmuc','sanpham'));  
    }
    public function delete_cart($rowId){
        Cart::update($rowId, 0);
        return redirect('/show_cart');
    }
}
