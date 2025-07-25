<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;
    protected $fillable = [
        'available_quantities', // Quantity of the product in stock
        'product_id', // Foreign key to products table
    ];
    public function products()
    {
        return $this->belongsTo(product::class);
}
}