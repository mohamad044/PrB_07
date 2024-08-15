<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('customer', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
        ]);

        $client = Client::findOrFail($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
