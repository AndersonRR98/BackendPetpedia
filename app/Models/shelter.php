<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shelter extends Model
{
    /** @use HasFactory<\Database\Factories\ShelterFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'responsible',
    ];
    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }
    public function pet(){
        return $this->hasone(Pet::class);
    }
}
