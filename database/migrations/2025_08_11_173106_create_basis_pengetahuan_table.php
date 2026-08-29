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
        Schema::create('basis_pengetahuan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rule', 10)->unique();
            $table->unsignedBigInteger('gejala_id');
            $table->unsignedBigInteger('cedera_id');
            $table->timestamps();

            $table->foreign('gejala_id')->references('id')->on('gejala')->onDelete('cascade');
            $table->foreign('cedera_id')->references('id')->on('cedera')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basis_pengetahuan');
    }
};
