<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentGroup extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'student_groups';

    protected $fillable = [
        'name','created_user','created_usertype','created_at','updated_at',
    ];
}
