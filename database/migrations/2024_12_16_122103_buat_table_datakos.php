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
        Schema::create('datakos', function(Blueprint $table){
            $table->id();
            $table->string('nama_kost', 100);
            $table->string('pemilik', 255);
            $table->string('alamat', 255);
            $table->string('jumlah_kamar', 100);
            $table->string('rating', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('datakos');
    }
};
