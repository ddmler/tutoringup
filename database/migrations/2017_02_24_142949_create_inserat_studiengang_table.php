<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInseratStudiengangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inserat_studiengang', function (Blueprint $table) {
            $table->integer('inserat_id')->unsigned();
            $table->integer('studiengang_id')->unsigned();
        });

        Schema::table('inserat_studiengang', function (Blueprint $table) {
            $table->foreign('inserat_id')->references('id')->on('inserate')->onDelete('cascade');
            $table->foreign('studiengang_id')->references('id')->on('studiengaenge')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inserat_studiengang');
    }
}
