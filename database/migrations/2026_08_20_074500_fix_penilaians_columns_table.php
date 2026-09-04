<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {

            if (!Schema::hasColumn('penilaians', 'kerja_sama')) {
                $table->integer('kerja_sama')->default(0)->after('komunikasi');
            }

            if (!Schema::hasColumn('penilaians', 'tanggung_jawab')) {
                $table->integer('tanggung_jawab')->default(0)->after('kerja_sama');
            }

        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {

            if (Schema::hasColumn('penilaians', 'kerja_sama')) {
                $table->dropColumn('kerja_sama');
            }

            if (Schema::hasColumn('penilaians', 'tanggung_jawab')) {
                $table->dropColumn('tanggung_jawab');
            }

        });
    }
};