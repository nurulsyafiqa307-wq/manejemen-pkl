<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = [
            'nama_perusahaan',
            'alamat',
            'pembimbing_lapangan',
            'no_hp_perusahaan',
            'tanggal_mulai',
            'tanggal_selesai',
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('pengajuan_pkls', $column)) {
                Schema::table('pengajuan_pkls', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }

    public function down(): void
    {
        Schema::table('pengajuan_pkls', function (Blueprint $table) {
            $table->string('nama_perusahaan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('pembimbing_lapangan')->nullable();
            $table->string('no_hp_perusahaan')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
        });
    }
};