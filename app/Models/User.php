<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
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
    return $this->hasone(shoppingcar::class);
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

//modelo de perfil que es polimorfico este es cuanod la rlacion es de uno a uno 
//morphone es cuando es de uno a uno
//morphmany es cuando es de uno a muchos
public function payments(){
    return $this->morphmany(payment::class, 'payable'); // ← relación polimórfica
}
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
      protected function getAllowIncluded()
    {
        return collect(get_class_methods($this))
            ->filter(function ($method) {
                $reflection = new \ReflectionMethod($this, $method);
                return $reflection->class === static::class &&
                       !$reflection->isStatic() &&
                       !$reflection->getParameters() &&
                       Str::startsWith((string) $reflection->getReturnType(), 'Illuminate\Database\Eloquent\Relations');
            })->values()->all();
    }

    // 🔍 Scope para permitir ?included=relacion1,relacion2
    public function scopeIncluded(Builder $query)
    {
        $allowIncluded = $this->getAllowIncluded();

        if (empty($allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));

        foreach ($relations as $key => $relation) {
            if (!in_array($relation, $allowIncluded)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

    // 🔎 Scope para permitir ?filter[columna]=valor
    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');

        foreach ($filters as $column => $value) {
            if (in_array($column, $this->allowFilter)) {
                $query->where($column, 'LIKE', '%' . $value . '%');
            }
        }
        
    }
      public function scopeGetOrPaginate(Builder $query)
    {
      if (request('perPage')) {
            $perPage = intval(request('perPage'));//transformamos la cadena que llega en un numero.

            if($perPage){//como la funcion intval retorna 0 si no puede hacer la conversion 0  es = false
                return $query->paginate($perPage);//retornamos la cuonsulta de acuerdo a la ingresado en la vaiable $perPage
            }


         }
           return $query->get();//sino se pasa el valor de $perPage en la URL se pasan todos los registros.
        //http://api.codersfree1.test/v1/categories?perPage=2
    }

      
// App\Models\Forum.php

public function scopeSort($query)
{
    if (request()->has('sort_by') && request()->has('sort_direction')) {
        $column = request('sort_by');
        $direction = request('sort_direction');

        // Validar columnas permitidas
        $allowed = ['title', 'creation_date'];
        if (in_array($column, $allowed)) {
            return $query->orderBy($column, $direction);
        }
    }}





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
