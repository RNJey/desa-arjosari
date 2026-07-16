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
    Schema::create('potensis', function (Blueprint $table) {
        $table->id();
        $table->string('kategori'); 
        $table->string('nama_komoditas'); 
        $table->text('deskripsi')->nullable();
        $table->string('info_1')->nullable(); 
        $table->string('info_2')->nullable(); 
        $table->string('image')->nullable(); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensis');
    }
};
