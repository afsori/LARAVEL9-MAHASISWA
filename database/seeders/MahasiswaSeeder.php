<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswa')->insert([
            'nama' => 'Bidi',
            'nim' => '42342',
            'alamat' => 'Tanggamus',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('mahasiswa')->insert([
            'nama' => 'Mela',
            'nim' => '552343',
            'alamat' => 'Sleman',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('mahasiswa')->insert([
            'nama' => 'Cici',
            'nim' => '1153355',
            'alamat' => 'Lampung',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
