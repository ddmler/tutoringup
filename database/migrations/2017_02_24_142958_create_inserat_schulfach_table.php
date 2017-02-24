<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInseratSchulfachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inserat_schulfach', function (Blueprint $table) {
            $table->integer('inserat_id')->unsigned();
            $table->integer('schulfach_id')->unsigned();
        });

        Schema::table('inserat_schulfach', function (Blueprint $table) {
            $table->foreign('inserat_id')->references('id')->on('inserate')->onDelete('cascade');
            $table->foreign('schulfach_id')->references('id')->on('schulfaecher')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inserat_schulfach');
    }
}
