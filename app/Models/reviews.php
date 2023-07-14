<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'content',
        'user_name',
        'course_id',
        'id_user',
        'rating',
    ];

}
