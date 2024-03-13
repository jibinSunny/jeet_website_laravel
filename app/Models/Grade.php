<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'grade';

    protected $fillable = [
        'grade','point','gradefrom','gradeupto','note','created_usertype','created_user',
    ];
}
