<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Truck;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::all()->count();
        $trucks = Truck::all()->count();
        $shipments = Shipment::all()->count();


        return view('backend.home.index', compact('customers', 'trucks', 'shipments'));
    }
}
