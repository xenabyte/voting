<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'contestant_id',
        'title',
        'edition_id',
    ];

    /**
     * Get the edition that owns the Winner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edition()
    {
        return $this->belongsTo(Edition::class, 'edition_id');
    }

    /**
     * Get the contestant that owns the Winner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contestant(): BelongsTo
    {
        return $this->belongsTo(Contestant::class, 'contestant_id');
    }
}
