<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('kerusakan_id')->constrained('kerusakan')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('keterangan')->nullable();
            $table->decimal('latitude', 10, 6);
            $table->decimal('longitude', 10, 6);
            $table->enum('status', ['pending', 'verified', 'in_progress', 'done', 'rejected'])->default('pending');
            $table->string('gambar_laporan')->nullable();
            $table->foreignId('kelurahan_id')->nullable()->constrained('kelurahan')->cascadeOnDelete();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan');
    }
};