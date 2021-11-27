<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trailers', function (Blueprint $table) {
            $table->id();
            $table->string('status', 10)->default('Active');
            $table->string('trailer_id', 15)->unique();
            $table->string('year', 4);
            $table->string('make', 30);
            $table->string('model', 30);
            $table->string('vin', 17)->unique();
            $table->string('owned_by', 50)->nullable();
            $table->string('equip_type_id',5);
            $table->string('tag', 50)->nullable();
            $table->string('tag_state', 2)->nullable();
            $table->string('tag_expiration', 12)->nullable();
            $table->string('last_inspection', 12)->nullable();
            $table->string('comments', 255)->nullable();
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
        Schema::dropIfExists('trailers');
    }
}
