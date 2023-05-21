<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'pet_id',
        'status',
        'complaint',
        'doctor_note',
        'recipe',
        'date',
        'hour',
        'status'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
