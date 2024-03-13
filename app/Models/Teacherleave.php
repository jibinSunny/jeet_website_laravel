<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacherleave extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'teacher_leaves';

    protected $fillable = [
        'teacher','academic_year','leaveassign','leave_category','no_of_day','applicable','remaining','created_user','created_usertype',
    ];
    public function leavecategoryname()
    {
        return $this->belongsTo(LeaveCategory::class, 'leave_category');
    }
}
