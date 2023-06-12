<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = ['appointment_date', 'appointment_time', 'description', 'patient_id', 'doctor_id','status'];

    function doctor(){
        return $this->hasOne(Doctor::class, 'id', 'doctor_id');
    }

    function patient(){
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
}
