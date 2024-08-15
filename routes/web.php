<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MessageController;

// عرض قائمة العملاء للعامة
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

// عرض قائمة الخدمات للعامة
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// عرض صفحة التواصل وإرسال رسالة
Route::get('/contact', [MessageController::class, 'showForm'])->name('contact');

// إرسال رسالة من نموذج التواصل
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

// لوحة التحكم (مؤمنة بجدار حماية - يمكن إضافة هذا لاحقاً)
Route::middleware(['auth'])->group(function () {
    // عرض صفحة إدارة العملاء
    Route::get('/admin/clients', [ClientController::class, 'adminIndex'])->name('admin.clients.index');
    // عرض صفحة إدارة الخدمات
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    // عرض رسائل الزوار
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
});

// صفحة العرض العامة
Route::get('/', function () {
    return view('welcome'); // استبدل 'welcome' بالصفحة الرئيسية المناسبة
})->name('home');
