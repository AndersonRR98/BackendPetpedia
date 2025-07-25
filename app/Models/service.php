<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'duration',
        'trainer_id',
        'requestt_id',
        'veterinary_id',
    ];
    public function trainers()
    {
        return $this->belongsTo(Trainer::class);
    }      
    public function requestts()
    {
        return $this->belongsTo(requestt::class);
    }
    public function veterinariens()
    {
        return $this->belongsTo(veterinary::class);
}
}