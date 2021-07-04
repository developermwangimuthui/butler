<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('customer_id')
            ->constrained();
            $table->foreignId('truck_id')
            ->constrained();
            $table->string('loading_point');
            $table->date('shipment_dispatch_date');
            $table->time('shipment_dispatch_time');
            $table->date('shipment_arrival_date');
            $table->time('shipment_arrival_time');
            $table->string('delivery_point_1');
            $table->string('delivery_point_2');
            $table->string('delivery_point_3');
            $table->string('delivery_point_4');
            $table->string('delivery_point_5');
            $table->string('cargo_description');
            $table->string('order_delivery_status');
            $table->string('delivery_note_number');
            $table->string('delivery_note_image')->nullable();
            $table->date('invoice_date');
            $table->string('order_payment_status');
            $table->string('transporter_rate_per_trip');
            $table->string('trip_challenges');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
