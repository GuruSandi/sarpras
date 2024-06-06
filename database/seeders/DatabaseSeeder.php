<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'foto'=>'img/account.png',
            'nama'=>'admin',
            'NIP'=>'102938394838',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123'),
            'status'=>'aktif',
            'role'=>'admin',
        ]);
        User::create([
            'foto'=>'img/account.png',
            'nama'=>'user',
            'NIP'=>'102938394838',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('123'),
            'status'=>'aktif',
            'role'=>'user',
        ]);
        sarpras::create([
            'kode_sarpras'=>'KD-20323',
            'nama_sarpras'=>'pencil',
            'status'=>'aktif',
            'foto'=>'img/pencil.jpg',
            'stok'=>'50',
            'jenis_sarpras'=>'baranghabis',
            'penerima_barang'=>'siti',
        ]);
        sarpras::create([
            'kode_sarpras'=>'KD-20324',
            'nama_sarpras'=>'kursi',
            'status'=>'aktif',
            'foto'=>'img/kursii.jpg',
            'stok'=>'50',
            'jenis_sarpras'=>'prasarana',
            'penerima_barang'=>'siti',
        ]);
        
    }
}
