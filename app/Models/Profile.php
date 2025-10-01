<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;
        use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'clinic_name',
        'address',
        'phone',
        'schedules',
        'specialty',
        'experience_years',
        'qualifications',
        'responsible',
    ];

    protected $casts = [
        'schedules' => 'array',
        'experience_years' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
