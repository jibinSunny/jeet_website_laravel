<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_types';

    protected $fillable = [
        'name','created_user','created_usertype'
    ];
}
