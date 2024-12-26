<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPopularityToWisatasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('wisatas', function (Blueprint $table) {
            $table->integer('popularity')->default(0);
        });
    }

    public function down()
    {
        Schema::table('wisatas', function (Blueprint $table) {
            $table->dropColumn('popularity');
        });
    }
};
