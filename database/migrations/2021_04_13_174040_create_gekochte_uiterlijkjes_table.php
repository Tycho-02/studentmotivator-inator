<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGekochteUiterlijkjesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gekochte_uiterlijkjes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("userId");
            $table->foreign('userId')->references('userId')->on('users');
            $table->string('skin');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gekochte_uiterlijkjes');
    }
}
