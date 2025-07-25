<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adoption extends Model
{
    /** @use HasFactory<\Database\Factories\AdoptionFactory> */
    use HasFactory;
    protected $fillable = [
        'status',
        'comment',
        'pet_id',
        'shelter_id',
    ];
    public function requests()
    {
        return $this->hasOne(Requestt::class);
    }
   
    public function shelters()
    {
        return $this->belongsTo(Shelter::class);
}
    public function pets()
    {
        return $this->belongsTo(Pet::class);
    }
}