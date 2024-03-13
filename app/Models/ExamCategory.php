<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'exam_categories';

    protected $fillable = [
        'name','date','description','created_user','created_usertype',
    ];
}
