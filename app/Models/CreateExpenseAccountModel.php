<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateExpenseAccountModel extends Model
{
    use HasFactory;

    protected $table = 'create_expense_account';

    protected $fillable = [
        'expense_account_name',
        'user_model_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_model_id');
    }

    // One-to-Many relationship with BalanceModel
    public function balances()
    {
        return $this->hasMany(BalanceModel::class, 'expense_account_model_id');
    }
}
