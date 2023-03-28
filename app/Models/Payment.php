<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id', 
        'r_payment_id', 
        'method', 
        'currency', 
        'status', 
        'user_email', 
        'amount', 
        'json_response', 
        'created_at', 
        'updated_at'
    ];
    protected $guarded = ['id'];
}
