<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'Users';
    protected $filtable = [
        'name',
        'address',
        'phone',
        'image',
        'password',
        'email',
    ];

}
