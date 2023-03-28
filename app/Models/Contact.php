<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Contact extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id', 
        'call', 
        'email', 
        'address', 
        'created_at', 
        'updated_at'
    ];

    public function contact()
    {
        return $this->belongsToMany('App\Models\jobpost');
    }
    

}
