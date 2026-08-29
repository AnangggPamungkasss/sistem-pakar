<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('basis_pengetahuan', function (Blueprint $table) {
            // hapus unique yang ada di kolom kode_rule
            $table->dropUnique(['kode_rule']);
        });
    }

    public function down(): void
    {
        Schema::table('basis_pengetahuan', function (Blueprint $table) {
            // kalau rollback, tambahkan lagi unique
            $table->unique('kode_rule');
        });
    }
};
