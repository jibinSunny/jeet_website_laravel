<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionOption extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'question_option';

    protected $fillable = [
        'question','name','answer','type',
    ];
    public function questions() {
        return $this->belongsTo(QuestionBank::class, 'question');
    }
}
