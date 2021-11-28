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
            $table->string('trailer_id', 15)->unique()->index();
            $table->string('year', 4)->index();
            $table->string('make', 30)->index();
            $table->string('model', 30)->index();
            $table->string('vin', 17)->unique();
            $table->string('owned_by', 50)->nullable()->index();
            $table->string('equip_type_id',5)->index();
            $table->string('tag', 50)->nullable()->index();
            $table->string('tag_state', 2)->nullable()->index();
            $table->string('tag_expiration', 12)->nullable()->index();
            $table->string('last_inspection', 12)->nullable()->index();
            $table->string('comments', 255)->nullable()->index();
            $table->integer('entered_by')->nullable()->index();
            $table->string('attachments')->nullable()->index();
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
