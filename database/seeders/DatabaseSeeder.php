<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $bulan = [
            [
                'id' => 1,
                'nama_bulan' => 'Januari'
            ],
            [
                'id' => 2,
                'nama_bulan' => 'Februari'
            ],
            [
                'id' => 3,
                'nama_bulan' => 'Maret'
            ],
            [
                'id' => 4,
                'nama_bulan' => 'April'
            ],
            [
                'id' => 5,
                'nama_bulan' => 'Mei'
            ],
            [
                'id' => 6,
                'nama_bulan' => 'Juni'
            ],
            [
                'id' => 7,
                'nama_bulan' => 'Juli'
            ],
            [
                'id' => 8,
                'nama_bulan' => 'Agustus'
            ],
            [
                'id' => 9,
                'nama_bulan' => 'September'
            ],
            [
                'id' => 10,
                'nama_bulan' => 'Oktober'
            ],
            [
                'id' => 11,
                'nama_bulan' => 'November'
            ],
            [
                'id' => 12,
                'nama_bulan' => 'Desember'
            ],
        ];

        DB::table('bulan')->insert($bulan);

        $tahun = [
            [
                'id' => 1,
                'nama_tahun' => '2024'
            ],
            [
                'id' => 2,
                'nama_tahun' => '2025'
            ],
        ];

        DB::table('tahun')->insert($tahun);
    }
}
