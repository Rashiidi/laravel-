<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function front()
    {
        $services = Service::paginate('6');
        return view('services.front', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Service::create($request->all());

        return redirect('/services')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service->update($request->all());

        return redirect('/services')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect('/services')->with('success', 'Service deleted successfully!');
    }

public function showServices()
{
    $services = Service::paginate(6); // Fetch services with pagination (6 per page)
    return view('services.showServices', compact('services')); // Pass the paginated services to the view
}
}