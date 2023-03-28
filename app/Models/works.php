<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\names;
use App\Models\Image;
class works extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'work ',
        'created_at',
        'updated_at'
    ];
    public function names(){
        return $this->belongsToMany(names::class,'names_works');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imagable');
    }

    public function images(){
        return $this->morphMany(Image::class, 'imagable');
    }
}


