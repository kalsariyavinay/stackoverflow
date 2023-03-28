<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;


class Answer extends Model
{
    use HasFactory;

    protected $fillable  = [
        'id',
        'user_id',
        'question_id',
        'status',
        'answer',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function questions()
    {
        return $this->hasOne(Question::class, 'id', 'question_id');
    }
}
