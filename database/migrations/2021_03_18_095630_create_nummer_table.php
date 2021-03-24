<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNummerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nummer', function (Blueprint $table) {
            // $table->unsignedBigInteger('afspeellijstId');
            // $table->foreign('afspeellijstId')->references('afspeellijstId')->on('afspeellijst');
            $table->string('naam');
            $table->string('artiest');
            $table->string('genre');
            $table->string('bestandLocatie');
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
        Schema::table('nummer', function (Blueprint $table) {
            $table->dropForeign('nummer_afspeellijstId_foreign');

        });
        Schema::dropIfExists('nummer');
    }
}
