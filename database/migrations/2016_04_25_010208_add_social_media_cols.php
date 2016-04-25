<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialMediaCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_media', function (Blueprint $table) {
            $table->string('gender');
            $table->string('addresses');
            $table->string('jobs');
            $table->string('educations');
            $table->string('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_media', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('addresses');
            $table->dropColumn('jobs');
            $table->dropColumn('educations');
            $table->dropColumn('images');
        });
    }
}
