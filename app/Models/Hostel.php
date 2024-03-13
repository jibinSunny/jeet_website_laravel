<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hostel extends Model
{ 
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hostels';

    protected $fillable = [
        'name','hostel_type','address','note','created_at','updated_at',
    ];
}
