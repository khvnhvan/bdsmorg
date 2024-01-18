<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giaychungnhan extends Model
{
    use HasFactory;
    public $table = 'giaychungnhan';
    
    protected $primaryKey = 'id';
    protected $fillable = ['id',
    'MaDK',
    'NgayCap',
    'TrangThai'
];
}
