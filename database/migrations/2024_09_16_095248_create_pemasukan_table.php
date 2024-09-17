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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->increments('id_pemasukan');
            $table->date('tanggal_pemasukan');
            $table->unsignedInteger('kategori_pemasukan'); //Foreign key dengan id_kategori
            $table->foreign('kategori_pemasukan')->references('id_kategori')->on('kategori')->onDelete('cascade');
            $table->string('deskripsi_pemasukan',100);
            $table->integer('jumlah_pemasukan');

            //Foreign key 
            $table->unsignedInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade');
            //foreign key
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
        Schema::dropIfExists('pemasukan');
    }
};
