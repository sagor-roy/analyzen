<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'quiz_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ques(){
        return $this->hasMany(Question::class,'quiz_id','quiz_id');
    }
}
