<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\CreateActivity;
use App\Http\Livewire\ViewActivity;
use App\Http\Livewire\ManageCategory;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/create',CreateActivity::class)->name('create.activity');
    Route::get('/view/{slug}',ViewActivity::class)->name('view.activity');
    //Route::post('/view/{id}',ViewActivity::class)->name('store.activity');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('manage/categories',ManageCategory::class)->name('manage.category');
});

