<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->date('date_location');
            $table->unsignedBigInteger('adminAgence');
            $table->foreign('adminAgence')->references('id')->on('agences');
            $table->unsignedBigInteger('bienId');
            $table->foreign('bienId')->references('id')->on('biens');
            $table->unsignedBigInteger('clientId');
            $table->foreign('clientId')->references('id')->on('clients');
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
        Schema::dropIfExists('locations');
    }
}
