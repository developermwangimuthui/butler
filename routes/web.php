<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontEndController;

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

Auth::routes();
//...............................FrontEnd Routes.....................//
Route::get('/', [FrontEndController::class, 'index'])->name('index');
Route::get('/about', [FrontEndController::class, 'about'])->name('about');
Route::get('/blog', [FrontEndController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
Route::get('/fleet-safety-policy', [FrontEndController::class, 'fleet_safety_policy'])->name('fleet-safety-policy');
Route::get('/intergrated-solutions', [FrontEndController::class, 'intergrated_solutions'])->name('intergrated-solutions');
Route::get('/management-services', [FrontEndController::class, 'management_services'])->name('management-services');
Route::get('/solutions', [FrontEndController::class, 'solutions'])->name('solutions');
Route::get('/transport', [FrontEndController::class, 'transport'])->name('transport');




Route::get('/home', [HomeController::class, 'index'])->name('home');
