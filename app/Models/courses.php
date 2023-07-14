<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'image',
        'id_category',
        'id_class',
        'id_promotions',
        'id_teachers',
        'price',
        'description'
    ];


}
