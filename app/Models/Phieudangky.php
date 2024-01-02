<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieudangky extends Model
{
    use HasFactory;

    public $table = 'phieudangky';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
    'id_lich',
    'NgayDKy',
    'LuongMau',
    'TrangThaiHien',
    'Ykienbacsi',
    'user_id',
    'MaCauTL'
];
}
