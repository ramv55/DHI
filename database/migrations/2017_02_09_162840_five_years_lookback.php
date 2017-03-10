<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FiveYearsLookback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('five_years_lookback', function (Blueprint $table) {
            $table->increments('five_years_lookback_id');
            $table->integer('company_id');
            $table->integer('property_id');
            $table->string('mile_radius',100);
            $table->string('hail_radius',100);
            $table->string('wind_gusts',100);
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
        Schema::dropIfExists('five_years_lookback');
    }
}
