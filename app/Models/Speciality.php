<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $table = 'speciality';

    protected $primaryKey = 'id';


    protected $fillable = [
        'type','description'
    ];

}
