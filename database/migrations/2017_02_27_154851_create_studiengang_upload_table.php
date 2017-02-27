<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiengangUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studiengang_upload', function (Blueprint $table) {
            $table->integer('upload_id')->unsigned();
            $table->integer('studiengang_id')->unsigned();
        });

        Schema::table('studiengang_upload', function (Blueprint $table) {
            $table->foreign('upload_id')->references('id')->on('uploads')->onDelete('cascade');
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
        Schema::dropIfExists('studiengang_upload');
    }
}
