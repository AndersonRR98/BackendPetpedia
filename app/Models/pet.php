<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pet extends Model
{
    /** @use HasFactory<\Database\Factories\PetFactory> */
    use HasFactory;
    protected $filable=[
'name',
        'age',
        'species',
        'breed',
        'size',
        'sex',
        'description',
        'image',
        'birth_date',
        'shelter_id',
        'user_id',
        'veterinary_id',
    ];
    public function shelters()
    {
        return $this->belongsTo(Shelter::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function veterinaries()
    {
        return $this->belongsTo(Veterinary::class);
}
}