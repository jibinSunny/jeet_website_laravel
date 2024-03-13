<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Art extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'arts';

    protected $fillable = [
        'name','created_user','created_usertype'
    ];
}
