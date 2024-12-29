<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kuliners', function (Blueprint $table) {
            $table->string('jam_operasional')->nullable();
            $table->string('harga')->nullable();
            $table->text('fasilitas')->nullable();
            $table->text('lokasi')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('tiktok')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kuliners', function (Blueprint $table) {
            $table->dropColumn('jam_operasional');
            $table->dropColumn('harga');
            $table->dropColumn('fasilitas');
            $table->dropColumn('lokasi');
            $table->dropColumn('instagram');
            $table->dropColumn('whatsapp');
            $table->dropColumn('tiktok');
        });
    }
};
