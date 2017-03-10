<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuildingDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_details', function (Blueprint $table) {
            $table->increments('building_id');
            $table->integer('property_id');
            $table->enum('roof_type', ['Low Slope','High Slope']);
            $table->enum('building_size', ['Small','Medium','Large']);
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
        Schema::dropIfExists('building_details');
    }
}
