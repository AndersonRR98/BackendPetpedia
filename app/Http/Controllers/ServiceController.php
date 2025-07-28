<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::included()->filter()->sort()->getOrPaginate();
        return response()->json($services);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'duration' => 'required|date',
            'trainer_id' => 'nullable|exists:trainers,id',
            'requestt_id' => 'nullable|exists:requestts,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        $service = Service::create($request->all());
        return response()->json($service, 201);
    }

    public function show($id)
    {
        $service = Service::with(['trainer', 'requestt', 'veterinary'])->findOrFail($id);
        return response()->json($service);
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'description' => 'sometimes|string',
            'duration' => 'sometimes|date',
            'trainer_id' => 'nullable|exists:trainers,id',
            'requestt_id' => 'nullable|exists:requestts,id',
            'veterinary_id' => 'nullable|exists:veterinaries,id',
        ]);

        $service->update($request->all());
        return response()->json($service);
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
