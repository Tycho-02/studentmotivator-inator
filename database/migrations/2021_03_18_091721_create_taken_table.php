<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken', function (Blueprint $table) {
            $table->id('taakId');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->longText("title")->nullable(false);
            $table->longText("omschrijving");
            $table->string('status')->default('niet voltooid');
            $table->string('label');
            $table->integer('prioriteit');
            $table->timestamp('deadline');
            $table->timestamp('uitvoerdatum')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taken', function (Blueprint $table) {
            $table->dropForeign('taken_userId_foreign');
        });
        
        Schema::dropIfExists('taken');
    }
}
