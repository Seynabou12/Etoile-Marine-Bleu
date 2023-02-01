<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom',255);
            $table->string('prenom',255);
            $table->string('adresse',255)->nullable();
            $table->string('telephone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->boolean('status')->default(1);

            $table->timestamps();
            $table->foreignId('entreprise_id')->nullable();

            //Foreigns Keys
            $table->foreign('entreprise_id')->references("id")->on('entreprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidats');
    }
}
