<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('transaction_code')->unique();
            $table->string('ngo');
            $table->string('center');
            $table->string('household');
            $table->dateTime('date_given');
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
        Schema::dropIfExists('dispatch_reports');
    }
}
