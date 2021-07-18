<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\delivery_status_report;
use App\Models\Shipment;
use App\Models\Truck;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $status = [
            '2021-07-12'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'4',
                '5'=>'0',
            ],
            '2021-07-14'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'3',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-13'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'9',
                '5'=>'0',
            ],
        ];

        if (array_key_exists( '2021-07-11', $status)) {
            dd("The '2021-07-12' element is in the array");
        }else {
            $status['2021-07-11']= [
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ];
        }
        ksort($status);

        // dd($status);

        return view('backend.reports.index');

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

    public function get_report_data ()
    {
          //
          $ORDER_DELIVERY_STATUS = [
            "0" => "On Time, in-Full, No Damage ",
            "1" => "On Time, in-Transit-Damages",
            "2" => "On Time, in-Transit-Losses",
            "3" => "Late,in-Full, No Damage",
            "4" => "Late, in-Full, on-Transit-Damages",
            "5" => "Late, in-Transit-Losses",
        ];


        $shipments = Shipment::pluck('delivery_points');
        // dd($shipments);
      /*  */
      $array = [];

       /*  $array = [
            '2021-07-12'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-13'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-14'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-15'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-16'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-17'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-18'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-19'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],
            '2021-07-20'=>[
                '0'=>'0',
                '1'=>'0',
                '2'=>'0',
                '3'=>'0',
                '4'=>'0',
                '5'=>'0',
            ],

        ]; */

        $status = [];

        function confirmDate($date, $order, $array) {
            $ORDER_DELIVERY_STATUS = [
                "0" => "On Time, in-Full, No Damage ",
                "1" => "On Time, in-Transit-Damages",
                "2" => "On Time, in-Transit-Losses",
                "3" => "Late,in-Full, No Damage",
                "4" => "Late, in-Full, on-Transit-Damages",
                "5" => "Late, in-Transit-Losses",
            ];

            $delivery_dates = [
                '2021-07-12',
                '2021-07-13',
                '2021-07-14',
                '2021-07-15',
                '2021-07-16',
                '2021-07-17',
                '2021-07-18',
            ];

            if (array_key_exists( $date, $array)) {
                ksort($array);
                return $array;

            }else {
                $array[$date]= [
                    '0'=>0,
                    '1'=>0,
                    '2'=>0,
                    '3'=>0,
                    '4'=>0,
                    '5'=>0,
                ];
                ksort($array);
                return $array;
            }

            ksort($array);

            // dd($array);
        }

        for ($a = 0; $a < count($shipments); $a++) {

            for ($i = 0; $i < count($shipments[$a]); $i++) {

                $order= $shipments[$a][$i]['order_delivery_status'];
                $date= $shipments[$a][$i]['shipment_arrival_date'];

                $array = confirmDate($date, $order, $array);
                $array[$date][$order]++;

            }

        }

        // dd($array);

        $Status0 = array_column($array, '0');
        $Status1 = array_column($array, '1');
        $Status2 = array_column($array, '2');
        $Status3 = array_column($array, '3');
        $Status4 = array_column($array, '4');
        $Status5 = array_column($array, '5');


        $foo = [];

        foreach ($array as $key => $value) {

            $foo[]=$key;
        }


        return response([
            'dates' => $foo,
            'Status0'=>$Status0,
            'Status1'=>$Status1,
            'Status2'=>$Status2,
            'Status3'=>$Status3,
            'Status4'=>$Status4,
            'Status5'=>$Status5,
        ], 200);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
