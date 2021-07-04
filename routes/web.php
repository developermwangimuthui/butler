<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\TruckController;

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

//..............................Trucks......................................//

Route::get('/truck/index', [TruckController::class, 'index'])->name('truck.index');
Route::post('/truck/store', [TruckController::class, 'store'])->name('truck.store');
Route::get('/truck/edit/{id}', [TruckController::class, 'edit'])->name('truck.edit');
Route::get('/truck/show/{id}', [TruckController::class, 'show'])->name('truck.show');
Route::put('/truck/store', [TruckController::class, 'update'])->name('truck.update');
Route::get('/truck/delete/{id}', [TruckController::class, 'destroy'])->name('truck.delete');

//..............................Customers......................................//

Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('/customer/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
Route::put('/customer/store', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');

//..............................Locations......................................//

Route::get('/location/index', [LocationController::class, 'index'])->name('location.index');
Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
Route::get('/location/show/{id}', [LocationController::class, 'show'])->name('location.show');
Route::put('/location/store', [LocationController::class, 'update'])->name('location.update');
Route::get('/location/delete/{id}', [LocationController::class, 'destroy'])->name('location.delete');

//..............................Shipment......................................//

Route::get('/shipment/index', [ShipmentController::class, 'index'])->name('shipment.index');
Route::get('/shipment/create', [ShipmentController::class, 'create'])->name('shipment.create');
Route::post('/shipment/store', [ShipmentController::class, 'store'])->name('shipment.store');
Route::get('/shipment/edit/{id}', [ShipmentController::class, 'edit'])->name('shipment.edit');
Route::get('/shipment/show/{id}', [ShipmentController::class, 'show'])->name('shipment.show');
Route::put('/shipment/update', [ShipmentController::class, 'update'])->name('shipment.update');
Route::get('/shipment/delete/{id}', [ShipmentController::class, 'destroy'])->name('shipment.delete');


