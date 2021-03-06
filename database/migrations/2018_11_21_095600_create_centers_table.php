<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centers', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('code')->unique();
            $table->string('name');
            $table->string('slug');
            $table->integer('infrastructure_id');
            $table->integer('barangay_id');
            $table->integer('city_id');
            $table->boolean('has_water_supply')->default(false);
            $table->boolean('has_electricity_supply')->default(false);
            $table->boolean('has_network_coverage')->default(false);
            $table->integer('capacity')->default(0);
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
        Schema::dropIfExists('centers');
    }
}
