<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id', // Foreign key to categories table
        'veterinary_id', // Foreign key to veterinaries table
        'shoppingcar_id', // Foreign key to shoppingcars table
    ];
    public function categories()
    {
        return $this->belongsTo(category::class);
    }
    public function veterinaries()
    {
        return $this->belongsTo(veterinary::class);
    }
    public function shoppingcar()
    {
        return $this->belongsTo(shoppingcar::class);
    }
    public function orderitems()
    {
        return $this->hasMany(orderitem::class);
    }
    public function inventories()
    {
        return $this->hasMany(inventory::class);
    }

}
