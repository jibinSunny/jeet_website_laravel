<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'leave_categories';
    protected $fillable = [
        'name','description','created_user',
    ];
}
