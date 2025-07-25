<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    /** @use HasFactory<\Database\Factories\NotificationFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'appointment_id', // Foreign key to appointments table
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }       
    public function appointment()
    {
        return $this->belongsTo(appointment::class);
    }
}
