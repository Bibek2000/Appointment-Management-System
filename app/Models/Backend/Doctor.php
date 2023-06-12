<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['department', 'licence_no', 'image', 'user_id', 'status'];

    function appointment(){
        return $this->hasMany(Appointment::class);
    }

    function patient(){
        return $this->hasMany(Patient::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
