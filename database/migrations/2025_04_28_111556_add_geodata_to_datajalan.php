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
        Schema::table('data_jalan', function (Blueprint $table) {
            // Menambahkan kolom 'geodata_id' yang merupakan foreign key
            $table->unsignedBigInteger('geodata_id')->nullable();

            // Menetapkan foreign key constraint yang mengarah ke tabel geo_data
            $table->foreign('geodata_id')->references('id')->on('geodata')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_jalan', function (Blueprint $table) {
            $table->dropForeign(['geodata_id']);
            $table->dropColumn('geodata_id');
        });
    }
};
