<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    /** @use HasFactory<\Database\Factories\TrainerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'specialty',
        'experience',
        'qualifications',
        'phone',
        'email',
        'biography',
    ];
    public function appointment()
    {
        return $this->hasMany(appointment::class);
    }
    public function services(){
        return $this->hasmany(service::class);
    }
    public function pet(){
        return $this->hasMany(pet::class);
    }
    // este es el modelo de perfiles de la tabla de polimorfismo 
     public function profile()
    {
        return $this->morphOne(Profile::class, 'profileable');
    }
}
