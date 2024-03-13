<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherClass extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'teacher_classes';
    protected $fillable = [
        'teacher','class','division','academic_year',
    ];

    public function Teachername()
    {
        return $this->belongsTo(Teacher::class, 'teacher');
    }
    public function academic_yearname()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year');
    }
}
