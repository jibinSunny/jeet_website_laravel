<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userleave extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_leaves';

    protected $fillable = [
        'user','academic_year','leave_category','no_of_day','applicable','remaining','created_user','created_usertype',
    ];
}
