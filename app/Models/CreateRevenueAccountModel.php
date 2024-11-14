<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CreateRevenueAccountModel extends Model
{
    use HasFactory;

    protected $table = 'create_revenue_account';

    protected $fillable = [
        'revenue_account_name',
        'user_model_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_model_id');
    }

    // One-to-Many relationship with BalanceModel
    public function balances()
    {
    return $this->hasMany(BalanceModel::class, 'revenue_account_model_id');
    }
}
