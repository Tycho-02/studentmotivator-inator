<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLesroosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesrooster', function (Blueprint $table) {
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->id('lesroosterid');
            $table->date('dag');
            $table->string('modulecode');
            $table->string('modulenaam');
            $table->boolean('geluidGestuurd');
            $table->timestamp('tijdVan')->useCurrent();
            $table->timestamp('tijdTot')->useCurrent();
            $table->boolean('berichtsturen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lesrooster', function (Blueprint $table) {
            $table->dropForeign('lesrooster_userId_foreign');

        });
        Schema::dropIfExists('lesrooster');
    }
}
