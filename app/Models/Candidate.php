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

    
}
