<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable =
        [
            'total_amount',
            'id_user',
            'comment',
            'status',
            'order_date'
        ];

}
