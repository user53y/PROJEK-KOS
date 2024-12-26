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
        //
        Schema::create('datapengeluaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->constrained('jenispengeluaran')->onDelete('cascade');
            $table->string('deskripsi_pengeluaran');
            $table->decimal('jumlah_pengeluaran', 15, 2);
            $table->date('tanggal_pengeluaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
