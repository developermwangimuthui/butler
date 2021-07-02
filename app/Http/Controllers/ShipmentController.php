<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.shipment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'truck_id' => 'required',
            'loading_point' => 'required',
            'shipment_dispatch_date' => 'required',
            'shipment_dispatch_time' => 'required',
            'shipment_arrival_date' => 'required',
            'shipment_arrival_time' => 'required',
            'delivery_point_1' => 'required',
            'delivery_point_2' => 'required',
            'delivery_point_3' => 'required',
            'delivery_point_4' => 'required',
            'delivery_point_5' => 'required',
            'order_delivery_status' => 'required',
            'delivery_note_number' => 'required',
            'delivery_note_image' => 'required',
            'invoice_date' => 'required',
            'order_payment_status' => 'required',
            'transporter_rate_per_trip' => 'required',
            'trip_challenges' => 'required',

        ]);

        $shipment = new Shipment();
        $shipment->customer_id = $request->input('customer_id');
        $shipment->truck_id = $request->input('truck_id');
        $shipment->loading_point = $request->input('loading_point');
        $shipment->shipment_dispatch_date = $request->input('shipment_dispatch_date');
        $shipment->shipment_dispatch_time = $request->input('shipment_dispatch_time');
        $shipment->shipment_arrival_date = $request->input('shipment_arrival_date');
        $shipment->shipment_arrival_time = $request->input('shipment_arrival_time');
        $shipment->delivery_point_1 = $request->input('delivery_point_1');
        $shipment->delivery_point_2 = $request->input('delivery_point_2');
        $shipment->delivery_point_3 = $request->input('delivery_point_3');
        $shipment->delivery_point_4 = $request->input('delivery_point_4');
        $shipment->delivery_point_5 = $request->input('delivery_point_5');
        $shipment->order_delivery_status = $request->input('order_delivery_status');
        $shipment->delivery_note_number = $request->input('delivery_note_number');
        $shipment->delivery_note_image = $request->input('delivery_note_image');
        $shipment->invoice_date = $request->input('invoice_date');
        $shipment->order_payment_status = $request->input('order_payment_status');
        $shipment->transporter_rate_per_trip = $request->input('transporter_rate_per_trip');
        $shipment->trip_challenges = $request->input('trip_challenges');
        if ($shipment->save()) {
            return redirect()->route('shipment.index')
                ->with('success', 'Shipment added successfully!');
        } else {

            return redirect()->route('shipment.index')
                ->with('failure', 'Shipment not added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment, $id)
    {
        //
        $shipment->destroy($id);

        return redirect()->route('shipment.index')
        ->with('success','shipment removed successfully!');
    }
}
