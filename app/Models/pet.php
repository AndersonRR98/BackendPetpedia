<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class pet extends Model
{
    // ✅ Método que detecta automáticamente todas las relaciones
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
    protected $filable=[
'name',
        'age',
        'species',
        'breed',
        'size',
        'sex',
        'description',
        'image',
        'birth_date',
        'shelter_id',
        'user_id',
        'veterinary_id',
    ];
    public function shelters()
    {
        return $this->belongsTo(Shelter::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function veterinaries()
    {
        return $this->belongsTo(Veterinary::class);
}
}