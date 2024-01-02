<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table  = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
    'id',    
    'name',
    'email',
    'gender',
    'phone',
    'address',
    'workspace',
    'birthday',
    'MaMau',
    'role',
    'password',
    'updated_at',
    'created_at'
];

public function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::make($value);
}
}
