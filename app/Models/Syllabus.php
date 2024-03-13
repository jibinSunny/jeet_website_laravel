<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Syllabus extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'syllabuses';

    protected $fillable = [
        'name','description','file','class','academic_year','created_user','created_usertype','created_at','updated_at',
    ];
    public function Classname()
    {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function academicyearname()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year');
    }
}
