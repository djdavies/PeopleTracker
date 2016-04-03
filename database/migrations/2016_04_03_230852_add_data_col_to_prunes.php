<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataColToPrunes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prunes', function (Blueprint $table) {
            $table->dropColumn('content_data');
            $table->string('data');
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
            $table->dropColumn('data');
            $table->unsignedInteger('content_data');
        });
    }
}
