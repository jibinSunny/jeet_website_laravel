<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students_old_record extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'students_old_records';

}
