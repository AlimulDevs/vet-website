<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'patient_id',
        'service',
        'pet_id',
        'date',
        'hour',
        'minute',
        'complaint',
        'doctor_note',
        'recipe',
        'pickup',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function medical_record()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
