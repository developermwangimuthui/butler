<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        $data = Customer::all();

        return response()->json($data, 200);
    }

    public function index()
    {
        $customers = Customer::all();

        return view('backend.customers.index', compact('customers'));
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
            'email' => 'required',
            'phone' => 'required',
            'town' => 'required',
            'location_description' => 'required',
        ]);

        $password = Hash::make('password');

        $email = $request->input('email');

        if (DB::table('users')->where('email', $email)->doesntExist()) {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $email,
                'password' => $password
            ]);

            $userId = $user->id;

            $customer = new Customer();
            $customer->phone = $request->input('phone');
            $customer->user_id = $userId;
            $customer->town = $request->input('town');
            $customer->location_description = $request->input('location_description');

            if ($customer->save()) {
                return redirect()->route('customer.index')
                    ->with('success', 'Customer added successfully!');
            } else {

                return redirect()->route('customer.index')
                    ->with('failure', 'Customer not added!');
            }
        } else {

            return redirect()->route('customer.index')
                ->with('failure', 'User Already Exists!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, $id)
    {
        //
        $data = $customer->where('id', $id)->get();
        // dd($data);

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {

        $data = $request->all();

        $customer = Customer::find($data['id']);


        $customer->fill($data);

        if ($customer->save()) {
            return redirect()->route('customer.index')
                ->with('success', 'Customer Updated successfully!');
        } else {

            return redirect()->back()
                ->with('failure', 'OOPS an Error Occured!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, $id)
    {
        //
        $customer->destroy($id);

        return redirect()->route('customer.index')
            ->with('success', 'customer removed successfully!');
    }
}
