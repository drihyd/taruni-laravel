<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id', 'user_id','amount','return_response','cart_id','order_number','created_at','updated_at'
    ];
	
	protected $table = 'payments';
}