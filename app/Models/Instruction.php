<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instruction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'instruction';

    protected $fillable = [
        'name','title','content','created_user','created_usertype',
    ];
}
