<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'assignments';

    protected $fillable = [
        'name','description','category','deadline_date', 'class','division','academic_year',
        'subject','file','created_user','created_usertype','created_user','created_at',
        'updated_at',
    ];

    public function subjectname() {
        return $this->belongsTo(Subject::class, 'subject');
    }
    public function classname() {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function divisionname() {
        return $this->belongsTo(Division::class, 'division');
    }
    public function academic_yearname() {
        return $this->belongsTo(AcademicYear::class, 'academic_year');
    }
}
