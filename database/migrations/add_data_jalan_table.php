<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('data_jalan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->unsignedSmallInteger('lebar');
            $table->unsignedSmallInteger('panjang');
            $table->foreignId('kondisi_jalan_id')->constrained('kondisi_jalan')->cascadeOnDelete();
            $table->foreignId('kelurahan_id')->constrained('kelurahan')->cascadeOnDelete();
            $table->text('keterangan')->nullable();
            $table->foreignId('geodata_id')->nullable()->constrained('geodata')->nullOnDelete();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_jalan');
    }
};