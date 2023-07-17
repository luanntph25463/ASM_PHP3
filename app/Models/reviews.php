<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $filtable = [
        'course_id',
        'id_user',
        'id_user',
        'rating',
        'content',
    ];

}
