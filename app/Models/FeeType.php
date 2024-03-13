<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'feetypes';

    protected $fillable = [
        'name','fee_id','note','duration','created_user',
    ];
}
