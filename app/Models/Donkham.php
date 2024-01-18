<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donkham extends Model
{
    use HasFactory;
    public $table = 'donkham';
    protected $primaryKey = 'id';
    protected $fillable = ['id',
    'user_id',
    'MaCauTL',
    'CanNang',
    'NhietDo',
    'Time1',
    'HuyetAp1',
    'Mach1',
    'Time2',
    'HuyetAp2',
    'Mach2',
    'Hemoglobine',
    'ViemGanB', 
    'TrangThai',
    'id_phieudangky',
    'created_at',
    'updated_at'
];
}
