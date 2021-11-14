<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tractor_id')->unique();
            $table->string('vin_number');
            $table->string('equipment_type');
            $table->string('manufacturer');
            $table->string('manufactured_date');
            $table->string('model');
            $table->string('model_year');
            $table->string('country');
            $table->string('state');
            $table->string('is_leased');
            $table->string('owned_by');
            $table->string('leased_date');
            $table->string('notes');
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
        Schema::dropIfExists('equipment');
    }
}
