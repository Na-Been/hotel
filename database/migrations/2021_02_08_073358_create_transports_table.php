<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('model_name');
            $table->string('model_number');
            $table->date('purchase_date');
            $table->date('expire_date');
            $table->string('vehicle_type');
            $table->string('fuel_type');
            $table->string('vehicle_number');
            $table->string('driver_name');
            $table->string('vehicle_image');
            $table->integer('seat_capacity');
            $table->string('details');
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
        Schema::dropIfExists('transports');
    }
}
