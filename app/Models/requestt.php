<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestt extends Model
{
    /** @use HasFactory<\Database\Factories\RequesttFactory> */
    use HasFactory;
    protected $fillable=[
        'date',
        'priority',
        'application_status',
        'adoption_id',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function adoption(){
        return $this->belongsTo(adoption::class);
    }

}
