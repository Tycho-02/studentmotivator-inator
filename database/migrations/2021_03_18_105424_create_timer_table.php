<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timer', function (Blueprint $table) {
            $table->unsignedBigInteger('mobielId');
            $table->foreign('mobielId')->references('mobielId')->on('mobiel');
            $table->boolean('buzzer')->default(0);
            $table->time('tijd')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timer', function (Blueprint $table) {
            $table->dropForeign('timer_mobielId_foreign');

        });
        Schema::dropIfExists('timer');
    }
}
