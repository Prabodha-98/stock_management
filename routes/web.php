<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ReceiveController;



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


Route::get('/create-stock', [homeController::class, 'stock']);
Route::get('/manage-stock',[homeController::class, 'manage'])->name('manage.stock');
Route::get('/receive-item', [homeController::class, 'receive']);
Route::get('/issue-item', [homeController::class, 'issue']);

Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::post('/items-issue', [IssueController::class, 'store'])->name('issue.store');
Route::post('/items-receive',[ReceiveController::class,'store'])->name('receive.store');

Route::get('/items-remove/{id}', [ItemController::class, 'destroy'])->name('items.delete');
Route::get('/items-edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/update/{id}', [ItemController::class, 'update'])->name('items.update');



});

require __DIR__.'/auth.php';
