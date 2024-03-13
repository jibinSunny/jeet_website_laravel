<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caste extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'castes';

    protected $fillable = [
        'name','religion','created_user','created_usertype'
    ];
    public function Religionsname() {
        return $this->belongsTo(Religion::class, 'religion');
    }
}
