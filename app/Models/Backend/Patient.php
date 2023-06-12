<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = ['doctor_id', 'image', 'image', 'user_id','status'];

    function appointment(){
        return $this->belongsTo(Patient::class);
    }
    function doctor(){
        return $this->belongsTo(Patient::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
