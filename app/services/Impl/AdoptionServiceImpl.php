<?php

namespace App\Services\Impl;
use App\Models\Adoption;
use App\Services\adoptionService;

class AdoptionServiceImpl implements adoptionService
{
    public function getAll()
    {
        return Adoption::all();
    }

    public function getById($id)
    {
        return Adoption::findOrFail($id);
    }

    public function create(array $data)
    {
        return Adoption::create($data);
    }

    public function update($id, array $data)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->update($data);
        return $adoption;
    }

    public function delete($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->delete();
    }
}


