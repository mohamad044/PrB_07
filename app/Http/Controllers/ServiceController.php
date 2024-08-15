<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Display list of services to the public
    public function index()
    {
        $services = Service::all();
        return view('services', compact('services'));
    }

    // Store a new service
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'description' => 'required|string',
        ]);

        Service::create([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    // Update an existing service
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'description' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'name' => $request->name,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Delete a service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
