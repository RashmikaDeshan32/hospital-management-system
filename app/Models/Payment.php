<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use HasFactory;
    use Notifiable;


    protected $table = 'payments';

    protected $primaryKey = 'payment_id';


    protected $fillable = [
        'payment_status','payment_type','amount','appointment_id', 
    ];

}
