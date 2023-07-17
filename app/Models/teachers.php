<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $filtable = [
        'name',
        'address',
        'phone',
        'image',
        'description',
        'email',
    ];

}
