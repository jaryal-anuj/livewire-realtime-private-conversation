<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Conversations\ConversationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/conversations',[ConversationController::class,'index'])->name('conversations.index');
    Route::get('/conversations/create',[ConversationController::class,'create'])->name('conversations.create');
    Route::get('/conversations/{conversation}',[ConversationController::class,'show'])->name('conversations.show');
});

require __DIR__.'/auth.php';
