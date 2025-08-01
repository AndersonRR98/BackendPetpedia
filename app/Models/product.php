<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $allowFilter = [
        'id',
        'name',
        'description',
        'price',
        'image_path',
        'category_id',
        'veterinary_id',
        'shoppingcar_id',
    ];
    protected $allowSort = [
        'id',
        'name',
        'description',
        'price',
         'image_path',
        'category_id',
        'veterinary_id',
        'shoppingcar_id',
    ];
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id', // Foreign key to categories table
        'veterinary_id', // Foreign key to veterinaries table
        'shoppingcar_id', // Foreign key to shoppingcars table
    ];
    public function category():BelongsTo
    {
        return $this->belongsTo(category::class);
    }
    public function veterinary():BelongsTo
    {
        return $this->belongsTo(veterinary::class);
    }
    public function shoppingcar():BelongsTo
    {
        return $this->belongsTo(shoppingcar::class);
    }
    public function orderitems():HasMany
    {
        return $this->hasMany(orderitem::class);
    }
    public function inventories():HasMany
    {
        return $this->hasMany(inventory::class);
    }
    // En el modelo Veterinary
public function getImageUrlAttribute()
{
    return $this->image_path ? asset('storage/' . $this->image_path) : null;
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