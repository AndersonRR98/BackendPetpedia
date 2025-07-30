<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'comment',
        'pet_id',
        'shelter_id',
    ];

    protected $allowFilter = [
        'id',
        'status',
        'comment',
        'pet_id',
        'shelter_id',
    ];

    protected $allowSort = [
        'id',
        'status',
        'comment',
        'pet_id',
        'shelter_id',
    ];

    // ✅ Relaciones con tipos de retorno correctos
    public function requests(): HasOne
    {
        return $this->hasOne(Requestt::class);
    }

    public function shelter(): BelongsTo
    {
        return $this->belongsTo(Shelter::class);
    }

    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    // ✅ Método para obtener relaciones permitidas para included
    protected function getAllowIncluded(): array
    {
        return collect(get_class_methods($this))
            ->filter(function ($method) {
                $reflection = new \ReflectionMethod($this, $method);
                return $reflection->class === static::class &&
                    !$reflection->isStatic() &&
                    !$reflection->getParameters() &&
                    Str::startsWith((string) $reflection->getReturnType(), 'Illuminate\Database\Eloquent\Relations');
            })
            ->values()
            ->all();
    }

    // ✅ Scope para included
    public function scopeIncluded(Builder $query)
    {
        $allowIncluded = $this->getAllowIncluded();

        if (empty($allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));

        $filtered = array_filter($relations, function ($relation) use ($allowIncluded) {
            return in_array($relation, $allowIncluded);
        });

        $query->with($filtered);
    }

    // ✅ Scope para filtros
    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }

    // ✅ Scope para ordenamiento
    public function scopeSort(Builder $query)
    {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {
            $direction = 'asc';

            if (str_starts_with($sortField, '-')) {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }

    // ✅ Scope para obtener todos o paginar
    public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage = intval(request('perPage'));

            if ($perPage) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}


//url http://tusitio.test/api/adoptions?included=pets,shelters&filter[status]=pending&sort=-id&perPage=10
