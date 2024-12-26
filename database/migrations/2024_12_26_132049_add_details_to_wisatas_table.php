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
            $table->string('jam_operasional')->nullable()->change();
            $table->string('harga_tiket')->nullable()->change();
            $table->text('fasilitas')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wisatas', function (Blueprint $table) {
            $table->string('jam_operasional')->nullable(false)->change();
            $table->string('harga_tiket')->nullable(false)->change();
            $table->text('fasilitas')->nullable(false)->change();
        });
    }
};
