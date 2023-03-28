<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ContactUs extends Model
{
    protected $table = 'contacts_us';
    use HasFactory;
    protected $fillable  = [
        'id', 
        'user_id', 
        'name', 
        'email', 
        'phone_number', 
        'msg_subject', 
        'message', 
        'created_at', 
        'updated_at'
    ];

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = ucwords($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}