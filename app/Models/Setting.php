<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const STAGE_REGISTRATION = 'REGISTRATION';
    const STAGE_AUDITION = 'AUDITION';
    const STAGE_CONTEST_PROCESS = 'CONTEST_PROCESS';
    const STAGE_VOTING = 'VOTING';

    protected $fillable = [
        'stage',
        'edition_id',
    ];

    /**
     * Get the edition that owns the Setting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edition()
    {
        return $this->belongsTo(Edition::class, 'edition_id');
    }
}
