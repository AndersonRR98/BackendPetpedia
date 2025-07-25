<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;
    protected $fillable = [
        'date',
        'description',
        'status',
        'trainer_id',
        'veterinary_id',
    ];
    public function trainers()
    {
        return $this->belongsTo(Trainer::class);
    }
    public function veterinaries()
    {   
        return $this->belongsTo(Veterinary::class);
    }
    public function notification(){
        return $this->hasMany(Notification::class);
    }
}   
