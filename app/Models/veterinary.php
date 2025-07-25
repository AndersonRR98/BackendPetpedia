<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veterinary extends Model
{
   
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'schedules',
    ];
    public function service()
    {
       return $this->hasmany(service::class);
    }
    public function  appointment(){
        return $this->hasmany(appointment::class);
}
public function pet(){
    return $this->hasmany(pet::class);
}
public function product(){
return $this->hasMany(product::class);

}
// esta es de la tabla de perfiles de la tabla polimorfica 
 public function profile()
    {
        return $this->morphOne(Profile::class, 'profileable');
    }
}
