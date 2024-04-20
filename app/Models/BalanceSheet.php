<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceSheet extends Model
{
    use HasFactory;
protected $table = 'balance_sheets';
protected $fillable=[
        'date',
        'particular',
        'quantity',
        'revenue',
        'expense',
        'balance',
        'user_id'
    ];

public function user()
    {
        return $this->belongsTo(User::class);
    }
}
