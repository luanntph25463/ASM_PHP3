<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'Users';
    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'status'
    ];

}
