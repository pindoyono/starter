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
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id();
            $table->string('bidang_keahlian')->nullable();
            $table->string('nama_ruang')->nullable();
            $table->integer('jumlah_siswa')->nullable();
            $table->integer('panjang')->nullable();
            $table->integer('lebar')->nullable();
            $table->boolean('kondisi_ruang1')->default(false);
            // $table->string('kondisi_ruang1')->nullable();
            $table->string('kondisi_ruang2')->nullable();
            $table->string('kondisi_ruang3')->nullable();
            $table->string('kondisi_ruang4')->nullable();
            $table->string('kondisi_ruang5')->nullable();
            $table->string('kondisi_ruang6')->nullable();
            $table->string('kondisi_ruang7')->nullable();
            $table->string('apd1')->nullable();
            $table->string('apd2')->nullable();
            $table->string('apd3')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangs');
    }
};
