<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tractors', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('tractor_id')->unique();
            $table->string('year');
            $table->string('make');
            $table->string('model');
            $table->string('vin');
            $table->string('owned_by')->nullable();
            $table->string('driver_1')->nullable();
            $table->string('driver_2')->nullable();
            $table->string('tag')->nullable();
            $table->string('tag_state')->nullable();
            $table->string('tag_expiration')->nullable();
            $table->string('last_inspection')->nullable();
            $table->string('comments')->nullable();
            $table->integer('entered_by')->nullable();
            $table->string('attachments')->nullable();
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
        Schema::dropIfExists('tractors');
    }
}
