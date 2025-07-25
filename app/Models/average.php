<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class average extends Model
{
    /** @use HasFactory<\Database\Factories\AverageFactory> */
    use HasFactory;
    
   protected $fillable=[
    'type',
    'url',
    'upload_date',
    'topic_id',
    'answer_id'
   ];

   public function topics(){
        return $this->belongsto(topic::class);
   }
   public function answers(){
        return $this->belongsto(answer::class);
}
}
