<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Timeandlocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeandlocations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->dateTime('checkIn');
            $table->dateTime('checkOut')->nullable();
            $table->string('lat1');
            $table->string('lon1');
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
        Schema::dropIfExists('timeandlocations');
    }
}
