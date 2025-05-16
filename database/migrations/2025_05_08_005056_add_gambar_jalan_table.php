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
        Schema::create('gambar_jalan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('data_jalan_id');
            $table->foreign('data_jalan_id')->references('id')->on('data_jalan')->onDelete('cascade');
            $table->string('nama');
            $table->text('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
