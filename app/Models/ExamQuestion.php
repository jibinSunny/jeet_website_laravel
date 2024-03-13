<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'exam_questions';

    protected $fillable = [
        'exam','question','created_user','created_usertype','order','question_order'
    ];

    public function questions()
    {
        return $this->hasOne(QuestionBank::class,'id','question');
    }
}
