<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Truck;
use App\Http\Controllers\Controller;
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
        $shipments= Shipment::all();

        return view('backend.shipment.index', compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = Customer::all();
        $trucks = Truck::all();

        return view('backend.shipment.create', compact('customers', 'trucks'));
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
            'cargo_description' => 'required',
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
            'invoice_date' => 'required',
            'order_payment_status' => 'required',
            'transporter_rate_per_trip' => 'required',
            'trip_challenges' => 'required',

        ]);

        $data = $request->all();

        if ($request->hasFile('delivery_note_image')) {
            $thumb = $request->file('delivery_note_image');
            $thumb_file = $this->uploadImage($thumb, DIR_DELIVERY_NOTES_IMAGES);
            $data['delivery_note_image'] = $thumb_file;
        }

        $shipment = new Shipment();

        $shipment->fill($data);

        if ($shipment->save()) {
            return redirect()->route('shipment.index')
                ->with('success', 'Shipment added successfully!');
        } else {

            return redirect()->back()
                ->withInput()
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
    public function edit(Shipment $shipment, $id )
    {
        //
        $shipment= Shipment::find($id);
        $customers = Customer::all();
        $trucks = Truck::all();

        return view('backend.shipment.edit', compact('customers', 'trucks','shipment'));
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
       

        if ($request->hasFile('delivery_note_image')) {
            $thumb = $request->file('delivery_note_image');
            $thumb_file = $this->uploadImage($thumb, DIR_DELIVERY_NOTES_IMAGES);
            $data['delivery_note_image'] = $thumb_file;
        }

        $data = $request->all();

        $shipment = Shipment::find($data['id']);

        $shipment->fill($data);

        if ($shipment->save()) {
            return redirect()->route('shipment.index')
                ->with('success', 'Shipment Updated successfully!');
        } else {

            return redirect()->back()
                ->withInput()
                ->with('failure', 'OOPS! an Error occurred');
        }

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

        return redirect()->back()
        ->with('success','shipment removed successfully!');
    }
}
