<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // عرض نموذج التواصل
    public function showForm()
    {
        return view('contact');
    }

    // تخزين رسالة من نموذج التواصل
    public function store(Request $request)
    {
        // تحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // تخزين الرسالة في قاعدة البيانات
        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('contact')->with('success', 'Message sent successfully.');
    }
}

