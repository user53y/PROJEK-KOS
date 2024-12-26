<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('datapemasukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penghuni_id'); // Relasi ke tabel penghuni
            $table->decimal('jumlah', 10, 2); // Jumlah pemasukan
            $table->date('tanggal'); // Tanggal transaksi pemasukan
            $table->timestamps();

            // Relasi
            $table->foreign('penghuni_id')->references('id')->on('datapenghuni')->onDelete('cascade');
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
