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
        'edition_id',
        'amount',
        'status',
    ];

    /**
     * Get the candidate associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'transaction_id')->where('payment_for', $this->PAYMENT_REGISTRATION);
    }

    /**
     * Get the vote_payment associated with the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vote_payment()
    {
        return $this->hasOne(Vote::class, 'transaction_id')->where('payment_for', $this->PAYMENT_VOTING);
    }

    /**
     * Get the edition that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edition()
    {
        return $this->belongsTo(Edition::class, 'edition_id');
    }
    
}
