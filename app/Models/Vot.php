<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

class Vot extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'user_id',
        'question_id',
        'answer_id',
        'status',
        'type',
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

    public function answers()
    {
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }
    
}
