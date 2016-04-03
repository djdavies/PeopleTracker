<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGoogleResultsInPrunes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prunes', function (Blueprint $table) {
            $table->dropColumn('googleResults_id');
            $table->unsignedInteger('people_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prunes', function (Blueprint $table) {
            $table->dropColumn('people_id');
            $table->unsignedInteger('googleResults_id');
        });
    }
}
