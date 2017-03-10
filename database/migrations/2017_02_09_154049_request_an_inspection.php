<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestAnInspection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_an_inspection', function (Blueprint $table) {
            $table->increments('request_an_inspection_id');
            $table->integer('company_id');
            $table->integer('property_id');
            $table->integer('assigned_inspector_id');
            $table->integer('building');
            $table->string('insurance_company');
            $table->string('claim_number');
            $table->enum('inspection_type', array('Full Inspection', 'Initial Inspaction'));
            $table->text('notes');
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
        Schema::dropIfExists('request_an_inspection');
    }
}
