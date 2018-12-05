<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicNeededItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_needed_items', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('hh_support_code');
            $table->string('top_level_category_id');
            $table->string('main_category_id');
            $table->string('subcategory_id');
            $table->string('unit');
            $table->integer('quantity');
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
        Schema::dropIfExists('basic_needed_items');
    }
}
