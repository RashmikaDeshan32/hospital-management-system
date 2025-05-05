<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $table = 'appointments';

    protected $primaryKey = 'id';


    protected $fillable = [
        'doctor_id',
        'patient_id',
        'schedule_id',
        'appointment_time',
        'appoinment_number',
        'status',
    ];

}
