<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kategori;
use App\Models\sarpras;
use Illuminate\Database\Seeder;
use App\models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'foto' => 'img/account.png',
            'nama' => 'admin',
            'NIP' => '102938394838',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'status' => 'aktif',
            'role' => 'admin',
        ]);
        User::create([
            'foto' => 'img/account.png',
            'nama' => 'user',
            'NIP' => '102938394838',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
            'status' => 'aktif',
            'role' => 'user',
        ]);
        kategori::create([
            'nama' => 'Barang Habis Pakai',
        ]);
        kategori::create([
            'nama' => 'Furnitur',
        ]);
        kategori::create([
            'nama' => 'Alat Olahraga',
        ]);
        kategori::create([
            'nama' => 'Alat Elektronik',
        ]);
        kategori::create([
            'nama' => 'Kendaraan',
        ]);
        sarpras::create([
            'kategori_id' => 1,
            'kode_sarpras' => 'KD-20323',
            'nama_sarpras' => 'pencil',
            'merk_barang' => 'Joyko',
            'spesifikasi_barang' => 'Tipe : 2B, Ukuran Pensil : 17.7 x 0.8 cm, Ukuran Box : 18 x 4.5 x 1.5 cm, Bentuk : Hexagonal Grip, Kayu berkualitas tinggi, Isi pensil yang kuat',
            'kondisi_barang' => 'ORI',
            'status' => 'aktif',
            'foto' => 'img/sarana/pencil.jpg',
            'stok' => '50',
            'jenis_sarpras' => 'sarana',
        ]);
        sarpras::create([
            'kategori_id' => 3,
            'kode_sarpras' => 'KD-20326',
            'nama_sarpras' => 'Bola Baket',
            'merk_barang' => 'Molten GL7 GL7X',
            'spesifikasi_barang' => 'Bahan Kulit Cair Asli Kualitas Tinggi, SIZE 7',
            'kondisi_barang' => 'ORI',
            'status' => 'aktif',
            'foto' => 'img/sarana/basket.jpg',
            'stok' => '50',
            'jenis_sarpras' => 'sarana',
        ]);
        // sarpras::create([
        //     'kode_sarpras' => 'KD-20324',
        //     'nama_sarpras' => 'kursi',
        //     'status' => 'aktif',
        //     'foto' => 'img/kursii.jpg',
        //     'stok' => '50',
        //     'jenis_sarpras' => 'prasarana',
        // ]);
    }
}
