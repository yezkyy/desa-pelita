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
        Schema::table('wisatas', function (Blueprint $table) {
            $table->string('jam_operasional')->nullable();
            $table->string('harga_tiket')->nullable();
            $table->text('fasilitas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wisatas', function (Blueprint $table) {
            $table->dropColumn(['jam_operasional', 'harga_tiket', 'fasilitas']);
        });
    }
};
