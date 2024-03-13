<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionBank extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'question_bank';

    protected $fillable = [
        'question','answer','explanation','totalOption','level','type','mark','hints','upload','subject','class','created_user','created_usertype',
    ];

    public function classes() {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function subjects() {
        return $this->belongsTo(Subject::class, 'subject');
    }
    public function levels() {
        return $this->belongsTo(QuestionLevel::class, 'level');
    }
    public function types() {
        return $this->belongsTo(QuestionType::class, 'type');
    }
}
