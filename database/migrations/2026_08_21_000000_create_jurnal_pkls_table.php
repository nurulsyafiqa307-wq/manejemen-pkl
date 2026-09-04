<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurnal_pkls', function (Blueprint $table) {
            $table->id('id_jurnal');

            $table->foreignId('siswa_id')
                ->constrained('siswas')
                ->cascadeOnDelete();

            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_pulang');

            $table->text('kegiatan');
            $table->text('kon')->nullable();
            $table->text('solusi')->nullable();

            $table->string('foto')->nullable();

            $table->enum('status_jurnal', [
                'Menunggu Review',
                'Disetujui',
                'Perlu Revisi'
            ])->default('Menunggu Review');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurnal_pkls');
    }
};