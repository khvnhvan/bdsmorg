<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    public $table  = 'lichhienmau';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
    'NgayHien',
    'SoNguoiCanHien',
    'SoNguoiDKy',
    'SoNguoiDaHien',
    'TongLuongMau',
    'LuongMauDaNhan'];
}
