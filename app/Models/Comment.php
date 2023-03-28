<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Comment extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'user_id',
        'question_id',
        'answer_id',
        'comment',
        'type',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

  
    
}
