<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vot;
use App\Models\tag;
use Auth;

class Question extends Model
{
    use HasFactory;
    protected $fillable  = [
        'id',
        'user_id',
        'title',
        'question',
        'description',
        'viewed',
        'tag',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function tags()
    {
        return $this->hasOne(tag::class, 'id', 'tag');
    }

    public function answers()
    {
        return $this->hasOne(Answer::class, 'id', 'answer_id');
    }

    public function vot_up()
    {
        return $this->hasMany(Vot::class,'question_id', 'id',);
    }

    public function vot_down()
    {
        return $this->hasMany(Vot::class,'question_id', 'id');
    }

    public function vot_q_active($id,$status)
    {
      if(Auth::check()){
          $active = Vot::where('question_id',$id)->where('user_id',Auth::user()->id)->where('type',1)->where('status',$status)->first();
          if($active){
            return 'active'; 
          }
      }  
      return "";
    }

    public function vot_up_a()
    {
        return $this->hasMany(Vot::class, 'question_id', 'id',);
    }

    public function vot_down_a()
    {
        return $this->hasMany(Vot::class, 'question_id', 'id');
    }

    public function vot_a_active($id, $a_id, $status)
    {
      if(Auth::check()){
          $active = Vot::where('question_id',$id)->where('answer_id',$a_id)->where('user_id',Auth::user()->id)->where('status',$status)->first();
          if($active){
            return 'active'; 
          }
      }  
      return "";
    }
 
    public function best_answer_id()
    {
        return $this->hasMany(Vot::class, 'best_answer_id', 'id');
    }

}
