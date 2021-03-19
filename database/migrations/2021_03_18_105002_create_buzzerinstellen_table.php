<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuzzerinstellenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buzzerinstellen', function (Blueprint $table) {
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->string('buzzermelodie');
            $table->time('buzzerTijdVan');
            $table->time('buzzerTijdTot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buzzerinstellen', function (Blueprint $table) {
            $table->dropForeign('buzzerinstellen_userId_foreign');

        });
        Schema::dropIfExists('buzzerinstellen');
    }
}
