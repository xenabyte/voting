<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;


    protected $fillable = [
        'category',
        'edition_id',
        'fullname',
        'nickname',
        'age', 
        'tribe', 
        'state_of_origin',
        'guardian_name',
        'guardian_email',
        'guardian_address',
        'guardian_phone_number',
        'relationship',
        'email',
        'address',
        'phone_number',
        'skills',
        'languages',
        'occupation', 
        'image',
        'transaction_id',
    ];

    /**
     * Get the edition that owns the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function edition()
    {
        return $this->belongsTo(Edition::class, 'edition_id');
    }

    /**
     * Get the payment that owns the Candidate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function kiddies ($query) {
        return $query->where('category',  'kiddies');
    }

    public function adult ($query) {
        return $query->where('category',  'adult');
    }

    
}
