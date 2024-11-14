<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceModel extends Model
{
    use HasFactory;

    protected $table = 'balance';

    protected $fillable = [
        'user_model_id',
        'value_received',
        'date_of_receipt',
        //---------------
        'expense_amount',
        'pantry_date',
    ];

    protected $casts = [
        'pantry_date' => 'datetime',
        'date_of_receipt' => 'datetime',
    ];

    // Relationship with expense account model
    public function expenseAccount()
    {
        return $this->belongsTo(CreateExpenseAccountModel::class, 'expense_account_model_id');
    }

    // Relationship with revenue account model
    public function revenueAccount()
    {
        return $this->belongsTo(CreateRevenueAccountModel::class, 'revenue_account_model_id');
    }
}
