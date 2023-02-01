<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ins_formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->foreignId('formation_id')->nullable();
            $table->foreign('formation_id')->references("id")->on('formations');

            $table->foreignId('candidat_id')->nullable();
            $table->foreign('candidat_id')->references("id")->on('candidats');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscription_formations');
    }
}
