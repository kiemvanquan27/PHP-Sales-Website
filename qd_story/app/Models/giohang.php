<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_danhmuc','id_sanpham','gia','mau','soluong','hinhanh','size','gia_tong','id_user','tensanpham','thanh_tien','is_active',
    ];
    protected $primarykey ='id';
    protected $table ='giohang';

    public function sanpham(){
        return $this->hasMany('App\Models\Sanpham');
    }
    public function donhang(){
        return $this->belongsTo('App\Models\donhang');
    }
}
