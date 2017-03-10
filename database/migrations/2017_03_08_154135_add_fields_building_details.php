<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsBuildingDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('building_details', function (Blueprint $table) {
        $table->string('address', 100)->after('building_size');
          $table->string('city', 100)->after('address');
          $table->string('state', 100)->after('city');
          $table->string('zipcode', 100)->after('state');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $table->dropColumn('city');
      $table->dropColumn('state');
      $table->dropColumn('zipcode');
    }
}
