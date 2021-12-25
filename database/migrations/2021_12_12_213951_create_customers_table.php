<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('status', 10)->default('Active');
            $table->string('code', 15)->unique()->index();
            $table->string('name', 100)->unique()->index();
            $table->string('Address_line_1', 100)->nullable();
            $table->string('Address_line_2', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zip', 15)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('fax', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('contact_name', 15)->nullable();
            $table->string('contact_phone', 15)->nullable();
            $table->string('contact_email', 100)->nullable();
            $table->string('contact_fax', 15)->nullable();
            $table->string('contact_mobile', 100)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
