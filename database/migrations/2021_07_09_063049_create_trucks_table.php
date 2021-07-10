<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('owners_name');
            $table->string('owners_phone');
            $table->string('registration');
            $table->foreignId('truck_make_id')->constrained('truck_makes');
            $table->foreignId('truck_type_id')->constrained('truck_types');
            $table->string('load_capacity');
            $table->string('cargo_bed_dimensions');
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
        Schema::dropIfExists('trucks');
    }
}
