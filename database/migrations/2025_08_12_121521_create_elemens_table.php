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
        Schema::create('elemens', function (Blueprint $table) {
            $table->id();
            $table->string('tag_elemen');
            $table->string('nama_elemen');
            $table->string('deskripsi');
            $table->string('icon_elemen');
            $table->longText('html_elemen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elemens');
    }
};
