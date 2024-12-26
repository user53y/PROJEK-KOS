<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('datapenghuni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('datakamar_id')->constrained('datakamar')->onDelete('cascade');
            $table->string('foto_ktp')->nullable();
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();
            $table->string('status');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datapenghuni');
    }
};
