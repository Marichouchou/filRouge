<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('nom_biens');
            $table->string('adresse');
            $table->string('etat_biens');
            $table->string('images_biens');
            $table->unsignedBigInteger('proprioId')->nullable;
            $table->foreign('proprioId')->references('id')->on('proprietaires');
            $table->unsignedBigInteger('typeId');
            $table->foreign('typeId')->references('id')->on('type_biens');
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
        Schema::dropIfExists('biens');
    }
}
