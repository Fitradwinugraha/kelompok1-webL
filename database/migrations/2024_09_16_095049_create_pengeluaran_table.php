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
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->increments('id_pengeluaran');
            $table->date('tanggal_pengeluaran');
            $table->unsignedInteger('kategori_pengeluaran');
            $table->foreign('kategori_pengeluaran')->references('id_kategori')->on('kategori')->onDelete('cascade');
            $table->string('deskripsi_pengeluaran',100);
            $table->integer('jumlah_pengeluaran');

            $table->unsignedInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');

            $table->unsignedInteger('id_dompet');
            $table->foreign('id_dompet')->references('id_dompet')->on('dompet')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran');
    }
};
