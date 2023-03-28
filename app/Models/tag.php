<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;
    
    protected $fillable  = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $guards = [];

    public function taggable(){
        return $this->morphTo();
    }
}

