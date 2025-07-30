<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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
    protected $allowFilter = [
        'id',
        'name',
        'email',
        'password',
        'role_id',
    ];  
    protected $allowSort = [
        'id',
        'name',
        'email',
        'password',
        'role_id',
    ];
    // el fillable es para hacer una asignacion masiva donde se pueden llenar los campos de seeder o datos por lo tanto si esto queda vacio no se podra crear un dato 
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];
   
    // se crearon todas las relaciones que tiene users hasta la polimorfica
    
public function forums():HasMany
{
    return $this->hasmany(forum::class);
}
public function role():BelongsTo
{
    return $this->belongsTo(role::class);
}
public function orders():HasMany
{
    return $this->hasmany(order::class);
}
public function shoppingcarts():HasOne
{
    return $this->hasone(shoppingcar::class);
}

public function notifications():HasMany
{
    return $this->hasmany(notification::class);
}
public function requestts():HasMany
{
    return $this->hasmany(requestt::class);
}
public function pets():HasMany
{
    return $this->hasmany(pet::class);
}
//tabla polimorfica  con pagos

//modelo de perfil que es polimorfico este es cuanod la rlacion es de uno a uno 
//morphone es cuando es de uno a uno
//morphmany es cuando es de uno a muchos
public function payments():MorphMany
{
    return $this->morphmany(payment::class, 'payable'); // ← relación polimórfica
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

     public function scopeFilter(Builder $query)
    {

        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');

        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {

            if ($allowFilter->contains($filter)) {

                $query->where($filter, 'LIKE', '%' . $value . '%');//nos retorna todos los registros que conincidad, asi sea en una porcion del texto
            }
        }

    }

    public function scopeSort(Builder $query)
    {

     if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

      foreach ($sortFields as $sortField) {

            $direction = 'asc';

            if(substr($sortField, 0,1)=='-'){ //cambiamos la consulta a 'desc'si el usuario antecede el menos (-) en el valor de la variable sort
                $direction = 'desc';
                $sortField = substr($sortField,1);//copiamos el valor de sort pero omitiendo, el primer caracter por eso inicia desde el indice 1
            }
            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);//ejecutamos la query con la direccion deseada sea 'asc' o 'desc'
            }
        }
        //http://api.blog.test/v1/categories?sort=name
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

/*public function scopeIncluded(Builder $query)
{
    $allowIncluded = $this->getAllowIncluded();
    dd($allowIncluded); // Esto te mostrará qué relaciones encontró


}*/


}