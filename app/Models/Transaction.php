<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const PAYMENT_REGISTRATION = 'REGISTRATION';
    const PAYMENT_VOTING = 'VOTING';

    protected $fillable = [
        'payment_for',
        'transaction_hash',
        'amount',
    ];
}
