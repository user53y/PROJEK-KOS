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
        Schema::table('datapenghuni', function (Blueprint $table) {
            $table->string('status')->default('Belum Lunas')->change();
        });
    }

    public function down()
    {
        Schema::table('datapenghuni', function (Blueprint $table) {
            $table->string('status')->change();
        });
    }

};
