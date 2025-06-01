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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->int('IdCategory');
            $table->string('Judul');
            $table->string('Penerbit');
            $table->date('TahunTerbit');
            $table->string('Pengarang');
            $table->string('Sampul');
            $table->date('CreateAt');
            $table->string('CreateBy');
            $table->string('isactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
