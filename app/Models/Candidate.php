<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

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


    public static function getValidationRule () {
        return [
            'category' => ['required', Rule::in(array('kiddies', 'adult'))], 
            'edition_id' => 'required|max:11',
            'fullname' => 'required|max:255',
            'nickname' => 'required|max:255',
            'age' => 'required|max:255',
            'tribe' => 'required|max: 255',
            'state_of_origin'=> 'required|max:255',
            'guardian_name'=> ['required_if:category, kiddies, max:255'],
            'guardian_email' => ['required_if:category,kiddies, max:255'],
            'guardian_address' => ['required_if:category, kiddies'],
            'guardian_phone_number' => ['required_if:category, kiddies, max:255'],
            'relationship'=> ['required_if:category, kiddies, max:255'],
            'email'=> ['required_if:category, adult, max:255'],
            'address' => ['required_if:category, adult, max:255'],
            'phone_number' => ['required_if:category, adult, max:255'],
            'skills' => ['required_if:category, adult, max:255'],
            'languages'=> ['required_if:category, adult, max:255'],
            'occupation'=> ['required_if:category, adult, max:255'],
            'image' => 'required|file|mimes:pdf,jpg,png,gif,jpeg|max:4096',
        ];
    }

     
}
