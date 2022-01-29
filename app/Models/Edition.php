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
        'registration_amount',
        'amount_per_vote'
    ];
}
