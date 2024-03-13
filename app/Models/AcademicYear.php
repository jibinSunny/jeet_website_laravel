<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'academic_years';

    protected $fillable = [
        'name','title', 'start_date', 'end_date','created_usertype','created_user','created_at',
        'updated_at',
    ];
}
