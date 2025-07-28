<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentmetho extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentmethoFactory> */
    use HasFactory;
    protected $fillable = [
        'type',
        'description',
        'date_issued',
        'payment_id',

    ];
    public function payments()
    {
        return $this->belongsTo(payment::class);
    }
}
