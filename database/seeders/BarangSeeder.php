<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'nama_barang' => 'router',
            'jumlah_barang' => 20
        ]);
        Barang::create([
            'nama_barang' => 'power suplay',
            'jumlah_barang' => 13
        ]);
        Barang::create([
            'nama_barang' => 'rfid',
            'jumlah_barang' => 3
        ]);
        Barang::create([
            'nama_barang' => 'proyektor',
            'jumlah_barang' => 7
        ]);
        Barang::create([
            'nama_barang' => 'akses point',
            'jumlah_barang' => 15
        ]);
        Barang::create([
            'nama_barang' => 'kabel lan',
            'jumlah_barang' => 6
        ]);
    }
}
