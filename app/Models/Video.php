<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tag;
class Video extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $guards = [];

    public function tags(){
        return $this->morphToMany(tag::class, 'taggable');
    }
}
