<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderitemFactory> */
    use HasFactory;
    protected $fillable = [
        'quantity', // Quantity of the product in the order item
        'price', // Price of the product
        'order_id', // Foreign key to orders table
        'product_id', // Foreign key to products table
    ];
    public function order()
    {
        return $this->belongsTo(order::class);
}
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
