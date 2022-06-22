<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'va_id',
        'payment_channel',
        'email',
        'account_number',
        'bank_code',
        'price',
        'status',
        'owner_id',
    ];
}
