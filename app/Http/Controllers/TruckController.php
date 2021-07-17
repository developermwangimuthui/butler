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
        $trucks = Truck::with('truck_type', 'truck_make')->get();

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

        $data = $request->all();

        $truck = new Truck();
        $truck -> fill($data);

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

        $truck = $truck->find($id);

        if($truck->shipments->count()){

            $notification = array(
                'message' => 'Can not Delete Item. Item is in use',
                'alert-type' => 'warning'
            );

            return redirect()->back()
                ->with($notification);
        }

        $truck->destroy($id);

        $notification = array(
            'message' => 'Truck removed successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()
            ->with($notification);
    }
}
