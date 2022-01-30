<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tagline',
        'year',
        'banner',
        'registration_amount',
        'amount_per_vote'
    ];

    /**
     * Get all of the candidates for the Edition
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    /**
     * Get all of the transactions for the Edition
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public static function getValidationRule () {
        return [
            'name' => 'required|max:255',
            'tagline' => 'required|max:255',
            'year' => 'required|max:255',
            'registration_amount' => 'required|max:255',
            'amount_per_vote' => 'required|max: 255',
            'banner' => 'required|file|mimes:pdf,jpg,png,gif,jpeg|max:4096',
        ];
    }
}
