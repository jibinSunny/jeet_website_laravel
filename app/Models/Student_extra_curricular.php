<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student_extra_curricular extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'student_extra_curriculars';
}
