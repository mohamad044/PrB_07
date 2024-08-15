<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // عرض نموذج التواصل
    public function showForm()
    {
        return view('contact'); // تأكد من أن ملف `contact.blade.php` موجود في `resources/views`
    }

    // تخزين الرسالة المرسلة من نموذج التواصل
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // إنشاء رسالة جديدة وتخزينها
        $message = new Message;
        $message->name = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->message = $validatedData['message'];
        $message->save();

        // إعادة التوجيه إلى صفحة التواصل مع رسالة نجاح
        return redirect()->route('contact')->with('success', 'تم إرسال رسالتك بنجاح');
    }

    // عرض جميع الرسائل (لإدارة الرسائل من لوحة الإدارة)
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index', compact('messages')); // تأكد من وجود ملف `index.blade.php` في `resources/views/admin/messages`
    }

    // عرض تفاصيل رسالة معينة (اختياري)
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message')); // تأكد من وجود ملف `show.blade.php` في `resources/views/admin/messages`
    }

    // حذف رسالة (اختياري)
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'تم حذف الرسالة بنجاح');
    }
}
