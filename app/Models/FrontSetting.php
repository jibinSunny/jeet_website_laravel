<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FrontSetting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'frontend_settings';

    protected $fillable = [
        'description','facebook','google','twitter','youtube','teacher_email_status','teacher_phone_status','login_menu_status','online_admission_status',
    ];
}
