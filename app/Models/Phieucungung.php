<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieucungung extends Model
{
    use HasFactory;
    public $table = 'cungungmau';
    
    protected $primaryKey = 'id';
    protected $fillable = [
    'id_vien',
    'id_emp',
    'MaMau',
    'LuongMau',
    'NgayCungUng',
    'TrangThai'
];
}
