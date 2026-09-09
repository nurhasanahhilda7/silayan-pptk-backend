<?php

namespace Database\Seeders;

use App\Models\Akun;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $petugasDemo = [
            ['username' => 'petugas1', 'password' => 'pptk2026', 'role' => 'petugas', 'nama' => 'Petugas PPTK 1', 'email' => ''],
            ['username' => 'petugas2', 'password' => 'pptk2026', 'role' => 'petugas', 'nama' => 'Petugas PPTK 2', 'email' => ''],
            ['username' => 'petugas3', 'password' => 'pptk2026', 'role' => 'petugas', 'nama' => 'Petugas PPTK 3', 'email' => ''],
        ];

        foreach ($petugasDemo as $p) {
            Akun::firstOrCreate(['username' => $p['username']], $p);
        }
    }
}
