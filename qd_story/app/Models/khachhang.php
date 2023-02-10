<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tenkhachhang','diachikhachhang','sdt','mailkhachhang'
    ];
    protected $primarykey ='id';
    protected $table ='khachhang';

}
