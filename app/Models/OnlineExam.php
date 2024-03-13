<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineExam extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'online_exams';

    protected $fillable = [
        'id','exam','question','answer','student'
    ];

    public function students()
    {
        return $this->hasOne(Student::class,'id','student');
    }
    public function questions()
    {
        return $this->hasOne(QuestionBank::class,'id','question');
    }
    public function exams()
    {
        return $this->hasOne(ExamSchedule::class,'id','exam');
    }
}
