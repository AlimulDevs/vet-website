<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'reservation_id',
        'date',
        'notes'

    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
