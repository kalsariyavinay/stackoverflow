<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'title',
        'price',
        'logo',
        'total_job_post',
        'is_published',
        'created_at',
        'updated_at'
    ];
}
