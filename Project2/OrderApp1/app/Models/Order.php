<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $fillable =[
        'order_id',
        'order_name',
        'order_email',
        'order_mobile',
        'order_sanpham',
        'order_gt',
    ];
}
