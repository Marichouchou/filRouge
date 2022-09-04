<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_visiteur');
            $table->string('prenom_visiteur');
            $table->date('date_visite');
            $table->time('heure_visite');
            $table->string('adresse_visite');
            $table->unsignedBigInteger('bienId');
            $table->foreign('bienId')->references('id')->on('biens')->onDelete('cascade');
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
        Schema::dropIfExists('visites');
    }
}
