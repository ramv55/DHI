<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PropertyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('property_id');
            $table->string('property_name');
            $table->integer('company_id');
            $table->string('contact_name');
            $table->string('phone', 20);
            $table->string('email', 150);
            $table->mediumText('address');
            $table->string('prop_img');
            $table->string('small_coordinate');
            $table->string('large_coordinate');
            $table->string('total_buildings');
            $table->string('small', 100);
            $table->string('medium', 100);
            $table->string('large', 100);
            $table->enum('customer', [0,1]);
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
        Schema::dropIfExists('property_details');
    }
}
