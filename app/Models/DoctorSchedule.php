<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DoctorSchedule extends Model
{
    use HasFactory;
    use Notifiable;

    // public $timestamps = false;

    protected $table = 'doctor_schedule';

    protected $primaryKey = 'id';


    protected $fillable = [
        'date', 'day', 'start_time','end_time','doctor_id',
    ];

}
