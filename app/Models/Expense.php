<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['expense_category','code','date','amount','file','description','created_usertype','created_user','created_at',
        'updated_at' ];
    public function expense_categories() {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category');
    }
    public function admins() {
        return $this->belongsTo(Admin::class, 'created_user');
    }
}
