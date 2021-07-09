<?php

namespace App\Http\Controllers;

use App\Models\Truck_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TruckTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $truck_types = $request->input('truck_types');

        foreach ($truck_types as $type) {
            Truck_type::create([
                'type'          =>  $type['type'],
                'description'   => $type['description']
            ]);
        }

        $notification = array(
            'message' => 'Truck Type(s) Updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with( $notification );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Truck_type  $truck_type
     * @return \Illuminate\Http\Response
     */
    public function show(Truck_type $truck_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Truck_type  $truck_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck_type $truck_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Truck_type  $truck_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck_type $truck_type)
    {
        //
        $data = $request->all();
        $type = Truck_type::find($data['id']);

        $type->fill($data);

        if ($type->save()) {

            $notification = array(
                'message' => 'Truck Type Updated successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('truck.index')
            ->with( $notification);
        }else {

            $notification = array(
                'message' => 'An Error Occured. Try again',
                'alert-type' => 'Error'
            );

            return redirect()->back()
                ->with( $notification );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Truck_type  $truck_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck_type $truck_type, $id)
    {
        //
        $truck_type->destroy($id);

        $notification = array(
            'message' => 'Truck Removed Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()
            ->with( $notification );
    }
}
