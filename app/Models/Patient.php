<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory;
    use Notifiable;

    public $timestamps = false;

    protected $table = 'patients';

    protected $primaryKey = 'patient_id';


    protected $fillable = [
        'first_name', 'last_name', 'phone_number','national_id','dob','gender','city_id','street','user_id',
    ];

}
