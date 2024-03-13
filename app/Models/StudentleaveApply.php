<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentleaveApply extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'student_leave_applications';

    protected $fillable = [
        'student','action_reason','reason','leave_category','apply_date','od_status','from_date','from_time','to_date','to_time','leave_days','attachment','applicationto_usertype','approver_user','approver_usertype','status','academic_year'
    ];

    public function studentname()
    {
        return $this->belongsTo(Student::class, 'student');
    }
    public function leave_categoryname()
    {
        return $this->belongsTo(LeaveCategory::class, 'leave_category');
    }
    public function usertypename()
    {
        return $this->belongsTo(UserType::class, 'applicationto_usertype');
    }
}
