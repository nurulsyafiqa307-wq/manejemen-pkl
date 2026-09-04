<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            if (!Schema::hasColumn('siswas', 'status_pkl')) {
                $table->string('status_pkl')->nullable()->after('guru_pembimbing_id');
            }
            if (!Schema::hasColumn('siswas', 'tempat_pkl')) {
                $table->string('tempat_pkl')->nullable()->after('status_pkl');
            }
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn(['status_pkl', 'tempat_pkl']);
        });
    }
};