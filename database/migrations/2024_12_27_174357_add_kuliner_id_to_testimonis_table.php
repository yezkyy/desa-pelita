<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKulinerIdToTestimonisTable extends Migration
{
    public function up()
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->unsignedBigInteger('kuliner_id')->nullable()->after('wisata_id');
            $table->foreign('kuliner_id')->references('id')->on('kuliners')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('testimonis', function (Blueprint $table) {
            $table->dropForeign(['kuliner_id']);
            $table->dropColumn('kuliner_id');
        });
    }
}