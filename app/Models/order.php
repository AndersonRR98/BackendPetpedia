<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'status',
        'total_amount',
        'order_date',
        'user_id',
    ];
    public function users(){
        return $this->belonsto(user::class);
    } 
    public function orderitem(){
        return $this->hasmany(orderitem::class);
    }
    public function shipment(){
        return $this->hasone(shipment::class);
    }
}
