<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProfile
 */
class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;
        use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'biography',
        'address',
        'photo',
        
    ];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
