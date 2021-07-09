<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Truck_make;
use App\Models\Truck_type;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks = Truck::all();

        $truck_types = Truck_type::all();
        $truck_makes = Truck_make::all();

        return view('backend.trucks.index',compact('trucks', 'truck_types', 'truck_makes'));
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

        $truck = new Truck();
        $truck->owners_name = $request->input('owners_name');
        $truck->owners_phone = $request->input('owners_phone');
        $truck->registration = $request->input('registration');
        $truck->make_id = $request->input('make_id');
        $truck->type_id = $request->input('type_id');
        $truck->load_capacity = $request->input('load_capacity');
        $truck->cargo_bed_dimensions = $request->input('cargo_bed_dimensions');
        if ($truck->save()) {

            $notification = array(
                'message' => 'Truck Created successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('truck.index')
                ->with($notification);
        } else {

            $notification = array(
                'message' => 'An Error Occured. Try again',
                'alert-type' => 'error'
            );

            return redirect()->route('truck.index')
                ->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck, $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        //
        $data = $request->all();

        $truck = Truck::find($data['id']);

        $truck->fill($data);

        if ($truck->save()) {

            $notification = array(
                'message' => 'Truck successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('truck.index')
            ->with($notification);
        }else {

            $notification = array(
                'message' => 'An Error Occured. Try again',
                'alert-type' => 'error'
            );

            return redirect()->back()
                ->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck, $id)
    {
        $truck->destroy($id);

        $notification = array(
            'message' => 'Truck removed successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()
            ->with($notification);
    }
}
