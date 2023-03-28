<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class names_works extends Model
{
    use HasFactory;
    protected $table = 'names_works';
    protected $guarded = ['id'];
}
