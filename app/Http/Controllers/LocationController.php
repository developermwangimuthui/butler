<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations= Location::all();

        return view('backend.locations.index', compact('locations'));
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
            'name' => 'required',
            'city' => 'required',
            'town' => 'required',
            'description' => 'required',

        ]);

        $data = $request->all();

        $location = new Location();

        $location->fill($data);

        if ($location->save()) {

            $notification = array(
                'message' => 'Location added successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('location.index')
            ->with($notification);
        } else {

            $notification = array(
                'message' =>'Location not added!' ,
                'alert-type' => 'error'
            );

            return redirect()->route('loaction.index')
            ->with($notification);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
        $data = $request->all();

        $location = Location::find($data['id']);

        $location->fill($data);

        if ($location->save()) {

            $notification = array(
                'message' => 'location Updated successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()
                ->with($notification );
        } else {

            $notification = array(
                'message' => 'OOPS an Error Occured!',
                'alert-type' => 'error'
            );

            return redirect()->back()
                ->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location , $id)
    {
        //

        $findShipment = $location->find($id);

        if($findShipment->shipments->count()){

            $notification = array(
                'message' => 'Can not Delete Item. Location is in use',
                'alert-type' => 'warning'
            );

            return redirect()->back()
                ->with($notification);
        }

        $location->destroy($id);

        $notification = array(
            'message' => 'Location removed successfully!',
            'alert-type' => 'warning'
        );

        return redirect()->back()
        ->with($notification);
    }
}
