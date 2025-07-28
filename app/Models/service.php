<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
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
