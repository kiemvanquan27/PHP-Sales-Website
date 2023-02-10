<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
    'id_sanpham','soluong','gia_tong','id_user','thanh_tien','is_active','is_delete','code_order','is_complete'
    ];
    protected $primarykey ='id';
    protected $table ='donhang';

    public function sanpham(){
        return $this->belongsToMany('App\Models\Sanpham')->withPivot('tensanpham');
    }
    public function User(){
        return $this->belongsTo('App\Models\User','id_user','id');
    }
    public function giohang(){
        return $this->hasMany('App\Models\giohang','id_sanpham');
    }
    

}
