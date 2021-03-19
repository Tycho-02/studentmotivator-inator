<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfspeellijstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afspeellijst', function (Blueprint $table) {
            $table->id('afspeellijstId');
            $table->unsignedBigInteger('userId');
            $table->string('naam');
            $table->integer('aantalNummers');
            $table->string('humeur');
            $table->foreign('humeur')->references('humeur')->on('humeur');
            $table->foreign('userId')->references('userId')->on('users');
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
        Schema::table('afspeellijst', function (Blueprint $table) {
            $table->dropForeign('afspeellijst_userId_foreign');
            $table->dropForeign('afspeellijst_humeur_foreign');

        });
        Schema::dropIfExists('afspeellijst');
    }
}
