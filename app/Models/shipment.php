<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    /** @use HasFactory<\Database\Factories\ShipmentFactory> */
    use HasFactory;
    protected $fillable = [
        'address',
        'cost',
        'shipping_method',
        'status',
        'order_id', // Foreign key to orders table
    ];
    public function orders()
{
    return $this->belongsTo(order::class);
}
}
