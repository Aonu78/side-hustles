<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/side-hustles', [App\Http\Controllers\HomeController::class, 'side_hustles'])->name('hustles.index');
Route::get('/side-hustles/{slug}', [App\Http\Controllers\HomeController::class, 'hustleShow'])->name('hustles.show');
Route::get('/finance-tools', [App\Http\Controllers\HomeController::class, 'finance_tools'])->name('finance-tools.index');
Route::get('/finance-tools/{slug}', [App\Http\Controllers\HomeController::class, 'financeToolShow'])->name('finance-tools.show');
Route::get('/resources', [App\Http\Controllers\HomeController::class, 'resources'])->name('resources.index');
Route::get('/resources/{slug}/download', [App\Http\Controllers\HomeController::class, 'resourceDownload'])->name('resources.download');
Route::get('/resources/{slug}', [App\Http\Controllers\HomeController::class, 'resourceShow'])->name('resources.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [BlogController::class, 'index'])->name('blog.search');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::view('/privacy-policy', 'pages.simple', [
    'title' => 'Privacy Policy',
    'body' => 'We collect only the information needed to run the site, respond to messages, and improve free tools and resources. Downloads may be counted so we can understand what visitors find useful.',
])->name('privacy');

Route::view('/terms-of-service', 'pages.simple', [
    'title' => 'Terms of Service',
    'body' => 'The guides, calculators, and resources on this site are for education and planning. Use your own judgment before making financial, tax, or business decisions.',
])->name('terms');

Route::view('/contact', 'pages.simple', [
    'title' => 'Contact',
    'body' => 'Have a question, suggestion, or resource request? Email hello@hustlefundamentals.test and we will review it.',
])->name('contact');

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/posts/list', [App\Http\Controllers\Admin\AdminController::class, 'postsList']);
    Route::resource('posts', App\Http\Controllers\Admin\PostsController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoriesController::class);
    Route::resource('tools', App\Http\Controllers\Admin\ToolsController::class);
    Route::resource('hustles', App\Http\Controllers\Admin\HustlesController::class);
    Route::resource('resources', App\Http\Controllers\Admin\ResourcesController::class);
});

require __DIR__.'/auth.php';
