<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'age',
        'weight',
        'species',
        'race',
        'is_sterile',
        'patient_id',
    ];
}
