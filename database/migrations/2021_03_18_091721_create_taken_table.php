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
            $table->id();
            // $table->unsignedBigInteger('userId');
            // $table->foreign('userId')->references('userId')->on('users');
            $table->longText("title")->nullable(false);
            $table->longText("omschrijving")->nullable();
            $table->string('status')->default('niet voltooid');
            $table->string('label')->nullable();
            $table->integer('prioriteit')->default(0);
            $table->date('deadline');
            $table->date('uitvoerdatum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('taken', function (Blueprint $table) {
        //     $table->dropForeign('taken_userId_foreign');
        // });
        
        Schema::dropIfExists('taken');
    }
}
