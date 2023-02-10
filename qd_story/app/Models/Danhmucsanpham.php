<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmucsanpham extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc','mota','kichhoat'
    ];
    protected $primarykey ='id';
    protected $table ='danhmuc';

    public function sanpham(){
        return $this->hasMany('App\Models\Sanpham');
    }
}
