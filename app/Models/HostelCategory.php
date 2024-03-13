<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HostelCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hostel_categories';

    protected $fillable = [
        'hostel	','class_type','fee','note','created_at','updated_at',
    ];

    public function Hostelname() {
        return $this->belongsTo(Hostel::class, 'hostel');
    }
}
