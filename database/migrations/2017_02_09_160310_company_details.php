<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_name');
            $table->enum('customer', [0,1]);
            $table->string('contact_name');
            $table->string('phone');
            $table->string('email');
            $table->mediumText('address');
            $table->string('min_radius');
            $table->string('min_hail_size');
            $table->string('min_wind_size');
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
        Schema::dropIfExists('company_details');
    }
}
