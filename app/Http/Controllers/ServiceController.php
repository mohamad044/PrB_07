<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // عرض قائمة الخدمات (للعامة)
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    // عرض نموذج إضافة خدمة (للمديرين)
    public function create()
    {
        return view('admin.services.create');
    }

    // تخزين خدمة جديدة (للمديرين)
    public function store(Request $request)
    {
        // تحقق من صحة البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|url', // Assuming the image is a URL; adjust validation as needed
            'description' => 'required|string',
        ]);

        $service = new Service;
        $service->title = $request->title;
        $service->image = $request->image;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    // عرض نموذج تعديل خدمة (للمديرين)
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    // تحديث بيانات خدمة (للمديرين)
    public function update(Request $request, $id)
    {
        // تحقق من صحة البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|url', // Assuming the image is a URL; adjust validation as needed
            'description' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->image = $request->image;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    // حذف خدمة (للمديرين)
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
