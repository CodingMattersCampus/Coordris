<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGivenItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('given_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dispatch_code');
            $table->string('center_code');
            $table->string('giver');
            $table->integer('rice')->default(0);
            $table->integer('water')->default(0);
            $table->integer('canned_goods')->default(0);
            $table->integer('noodles')->default(0);
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
        Schema::dropIfExists('given_items');
    }
}
