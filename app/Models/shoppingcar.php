<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoppingcar extends Model
{
    /** @use HasFactory<\Database\Factories\ShoppingcarFactory> */
    use HasFactory;
    protected $fillable = [
        'amount',
        'date',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(user::class);
    }       
    public function products()
    {
        return $this->hasMany(product::class);
    }
}
