<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorQualification extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $table = 'doctor_qualifications';

    protected $primaryKey = 'id';


    protected $fillable = [
        'qualification','doctor_id',
    ];

}
