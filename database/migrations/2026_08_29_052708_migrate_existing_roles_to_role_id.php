<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'guru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::statement("
            UPDATE users u
            JOIN roles r ON r.name = u.role
            SET u.role_id = r.id
        ");
    }

    public function down(): void
    {
        DB::table('users')->update([
            'role_id' => null
        ]);

        DB::table('roles')->delete();
    }
};