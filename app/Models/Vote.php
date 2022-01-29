<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'transaction_id',
        'contestant_id',
        'edition_id',
        'votes',
    ];

    /**
     * Get the transaction that owns the Vote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    /**
     * Get the contestant that owns the Vote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contestant()
    {
        return $this->belongsTo(Contestant::class, 'contestant_id');
    }

    /**
     * Get the edition that owns the Vote
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edition()
    {
        return $this->belongsTo(Edition::class, 'edition_id');
    }
}
