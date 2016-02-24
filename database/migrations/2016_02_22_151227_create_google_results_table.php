<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoogleResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('people_id');
            // $table->foreign('people_id')->references('id')->on('people');
            $table->timestamps();
            $table->string('url');
            $table->string('title');
            $table->string('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('google_results');
    }
}
