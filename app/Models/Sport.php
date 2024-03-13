<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sports';

    protected $fillable = [
        'name','created_user','created_usertype'
    ];
}
