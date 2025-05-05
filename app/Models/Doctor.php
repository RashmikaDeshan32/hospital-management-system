<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Doctor extends Model
{
    use HasFactory;
    use Notifiable;

    // public $timestamps = false;

    protected $table = 'doctors';

    protected $primaryKey = 'doctor_id';


    protected $fillable = [
        'first_name', 'last_name', 'phone_number','national_id','dob','gender','city_id','street','user_id','qualification','experience','consultation_fee','speciality_id','profile_picture','request_status','bio'
    ];


    public function schedule()
{
    return $this->hasMany(DoctorSchedule::class, 'doctor_id', 'doctor_id');
}


}
