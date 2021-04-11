<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiebuddyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studiebuddy', function (Blueprint $table) {
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->decimal('long');
            $table->decimal('lat');
            $table->string('naam');
            $table->string('skin');
            $table->double('ideale_temp');
            $table->double('ideale_luchtvochtigheid');
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
        Schema::table('studiebuddy', function (Blueprint $table) {
            $table->dropForeign('studiebuddy_userId_foreign');
        });
        Schema::dropIfExists('studiebuddy');
    }
}
