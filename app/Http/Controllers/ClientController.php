<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // عرض قائمة العملاء (للعامة)
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // عرض صفحة إضافة عميل (للمديرين)
    public function adminIndex()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    // عرض نموذج إضافة عميل (للمديرين)
    public function create()
    {
        return view('admin.clients.create');
    }

    // تخزين عميل جديد (للمديرين)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|url', // Assuming the image is a URL; adjust validation as needed
            'description' => 'required|string',
        ]);

        $client = new Client;
        $client->title = $request->title;
        $client->image = $request->image;
        $client->description = $request->description;
        $client->save();

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    // عرض نموذج تعديل عميل (للمديرين)
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    // تحديث بيانات عميل (للمديرين)
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|url', // Assuming the image is a URL; adjust validation as needed
            'description' => 'required|string',
        ]);

        $client = Client::findOrFail($id);
        $client->title = $request->title;
        $client->image = $request->image;
        $client->description = $request->description;
        $client->save();

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    // حذف عميل (للمديرين)
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }
}
