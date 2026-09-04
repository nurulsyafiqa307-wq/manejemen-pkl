<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->foreignId('guru_pembimbing_id')
                ->nullable()
                ->after('user_id')
                ->constrained('gurus')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropForeign(['guru_pembimbing_id']);
            $table->dropColumn('guru_pembimbing_id');
        });
    }
};