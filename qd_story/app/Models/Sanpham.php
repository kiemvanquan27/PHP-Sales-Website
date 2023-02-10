<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tensanpham','motasanpham','kichhoat','id_danhmuc','size','gia','soluong','mau','hinhanh'
    ];
    protected $primarykey ='id';
    protected $table ='sanpham';

    public function danhmucsanpham(){
        return $this->belongsTo('App\Models\Danhmucsanpham','id_danhmuc','id');
    }
    public function donhang(){
        return $this->belongsToMany('App\Models\donhang','donhang_sanpham','donhang_id','sanpham_id')->withPivot('tensanpham');
    }
    public function giohang(){
        return $this->hasMany('App\Models\giohang');
    }
}

