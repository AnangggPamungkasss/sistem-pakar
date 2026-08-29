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
        Schema::create('riwayat_diagnosa', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');     // pasien
                $table->unsignedBigInteger('cedera_id');   // hasil diagnosa
                $table->json('gejala_dipilih');            // simpan gejala yang dipilih pasien
                $table->timestamps();
            
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('cedera_id')->references('id')->on('cedera')->onDelete('cascade');     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_diagnosa');
    }
};
