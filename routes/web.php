<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Routes الملخصات
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // عرض صفحة إضافة ملخص
    Route::get('/summaries/create', [SummaryController::class, 'create'])
        ->name('summaries.create');
    // حفظ الملخص
    Route::post('/summaries', [SummaryController::class, 'store'])
        ->name('summaries.store');
    // عرض جميع الملخصات
    Route::get('/summaries', [SummaryController::class, 'index'])
        ->name('summaries.index');
    // تعديل ملخص
    Route::get('/summaries/{summary}/edit', [SummaryController::class, 'edit'])
    ->name('summaries.edit');
    // تحديث ملخص
    Route::put('/summaries/{summary}', [SummaryController::class, 'update'])
    ->name('summaries.update');
    // حذف ملخص
    Route::delete('/summaries/{summary}', [SummaryController::class, 'destroy'])
    ->name('summaries.destroy');

});

/*
|--------------------------------------------------------------------------
| Routes الملف الشخصي
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth.page');


require __DIR__.'/auth.php';
