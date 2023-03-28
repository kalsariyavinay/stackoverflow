<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\works;
use App\Models\Image;
class names extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public function works(){
        return $this->belongsToMany(works::class, 'names_works');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imagable');
    }

    public function images(){
        return $this->morphMany(Image::class, 'imagable');
    }

}
