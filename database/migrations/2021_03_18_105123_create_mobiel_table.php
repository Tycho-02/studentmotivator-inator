<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobielTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiel', function (Blueprint $table) {
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->id('mobielId');
            $table->boolean('beschikbaar');
            $table->boolean('berichtsturen');
            $table->boolean('smiley');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mobiel', function (Blueprint $table) {
            $table->dropForeign('mobiel_userId_foreign');

        });
        Schema::dropIfExists('mobiel');
    }
}
