<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTijdslapenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tijdslapen', function (Blueprint $table) {
            $table->id('tijdId');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->timestamp('tijdInBedGegaan')->useCurrent();
            $table->timestamp('tijdUitBedGegaan')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tijdslapen', function (Blueprint $table) {
            $table->dropForeign('tijdslapen_userId_foreign');

        });
        Schema::dropIfExists('tijdslapen');
    }
}
