<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveAssign extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'leave_assign';

    protected $fillable = [
        'leave_category','applicable','usertype','leave_days','academic_year','created_user','created_usertype','created_at','updated_at',
    ];

    public function usertypename()
    {
        return $this->belongsTo(UserType::class, 'usertype');
    }
    public function leavecategoryname()
    {
        return $this->belongsTo(LeaveCategory::class, 'leave_category');
    }
}
