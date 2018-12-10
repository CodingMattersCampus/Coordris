<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseholdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('households', function (Blueprint $table) {
            $table->increments('id');
            $table->string('HH_number');
            $table->string('head');
            $table->string('spouse')->nullable();
            $table->integer('total_members')->default(1);
            $table->uuid('center_code');
            $table->integer('total_infants')->default(0);
            $table->integer('total_elderly')->default(0);
            $table->integer('rice')->default(0);
            $table->integer('canned_goods')->default(0);
            $table->integer('noodles')->default(0);
            $table->integer('water')->default(0);
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
        Schema::dropIfExists('households');
    }
}
