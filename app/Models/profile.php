<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
  protected $fillable=[
    'profile_id',
    'profile_type',
  ];
  // En App\Models\Profile.php
public function profileable()
{
    return $this->morphTo();// ← relación polimórfica inversa
}

}
