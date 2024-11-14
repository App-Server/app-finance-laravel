<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevenueModel extends Model
{
    use HasFactory;

    protected $table = 'revenue_account';

    protected $fillable = [
        'revenue_account',
        'date_of_receipt',
        'value_received',
        'user_model_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
