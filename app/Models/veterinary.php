<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
class veterinary extends Model
{
   
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
     'schedules' => 'array',
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
    //polimorfismo en pago 
    public function payments()
    {
        return $this->morphMany(payment::class, 'payable');
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
}
