<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner_locator extends Model
{
    use HasFactory;
    protected $fillable = [
        'company',
        'status',
        'logo',
        'address',
        'website',
        'phone',
        'countries_covered',
        'states_covered'
    ];
}
