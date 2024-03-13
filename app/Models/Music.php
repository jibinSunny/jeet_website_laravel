<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'musics';

    protected $fillable = [
        'name','created_user','created_usertype'
    ];
}
