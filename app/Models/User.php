<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // el fillable es para hacer una asignacion masiva donde se pueden llenar los campos de seeder o datos por lo tanto si esto queda vacio no se podra crear un dato 
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_id',
    ];
   
    // se crearon todas las relaciones que tiene users hasta la polimorfica 
public function forums(){
    return $this->hasmany(forum::class);
}
public function orders(){
    return $this->hasmany(order::class);
}
public function shoppingcart(){
    return $this->hasone(shoppingcart::class);
}

public function notifications(){
    return $this->hasmany(notification::class);
}
public function requestts(){
    return $this->hasmany(requestt::class);
}
public function pets(){
    return $this->hasmany(pet::class);
}
//tabla polimorfica  con pagos
public function payments(){
    return $this->morphMany(payment::class);
}
//modelo de perfil que es polimorfico este es cuanod la rlacion es de uno a uno 
//morphone es cuando es de uno a uno
//morphmany es cuando es de uno a muchos
 public function profile()
    {
        return $this->morphOne(Profile::class, 'profileable'); // ← relación polimórfica directa
    }
    //esto sirve para cuando se quiera ingresar como admi y subadmin 
 public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isSubadmin()
    {
        return $this->role === 'subadmin';
    }
    // se ingresa como cliente 
    public function iscustomer()
    {
        return $this->role === 'customer';
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
