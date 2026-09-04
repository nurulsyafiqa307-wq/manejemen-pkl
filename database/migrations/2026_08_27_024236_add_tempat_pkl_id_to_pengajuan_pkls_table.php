<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuan_pkls', function (Blueprint $table) {
            if (!Schema::hasColumn('pengajuan_pkls', 'tempat_pkl_id')) {
                $table->foreignId('tempat_pkl_id')
                    ->after('siswa_id')
                    ->constrained('tempat_pkls')
                    ->onDelete('cascade');
            }

            if (!Schema::hasColumn('pengajuan_pkls', 'tanggal_pengajuan')) {
                $table->date('tanggal_pengajuan')
                    ->after('tempat_pkl_id')
                    ->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengajuan_pkls', function (Blueprint $table) {
            $table->dropForeign(['tempat_pkl_id']);
            $table->dropColumn(['tempat_pkl_id', 'tanggal_pengajuan']);
        });
    }
};