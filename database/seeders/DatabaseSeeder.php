<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Barang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $peranadmin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Admin'
        ]);
        $peranuser = Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'User'
        ]);
        $adminuser = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->addRole('admin');
        $userbiasa = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ])->addRole('user');

        $data = [
            ['nama' => 'kayu besi balok', 'ukuran' => '10x10x4'],
            ['nama' => 'kayu besi balok', 'ukuran' => '10x10x3'],
            ['nama' => 'kayu besi balok', 'ukuran' => '5x10x4'],
            ['nama' => 'kayu besi balok', 'ukuran' => '5x10x3'],
            ['nama' => 'kayu besi balok', 'ukuran' => '5x5x4'],
            ['nama' => 'kayu besi papan', 'ukuran' => '20x2x4'],
            ['nama' => 'kayu besi papan', 'ukuran' => '20x2.5x4'],
            ['nama' => 'kayu matoa balok', 'ukuran' => '10x10x4'],
            ['nama' => 'kayu matoa balok', 'ukuran' => '10x10x3'],
            ['nama' => 'kayu matoa balok', 'ukuran' => '5x10x4'],
            ['nama' => 'kayu matoa balok', 'ukuran' => '5x10x3'],
            ['nama' => 'kayu matoa balok', 'ukuran' => '5x5x4'],
            ['nama' => 'kayu matoa papan', 'ukuran' => '20x2x4'],
            ['nama' => 'kayu matoa papan', 'ukuran' => '20x2.5x4'],
            ['nama' => 'kayu putih balok', 'ukuran' => '10x10x4'],
            ['nama' => 'kayu putih balok', 'ukuran' => '10x10x3'],
            ['nama' => 'kayu putih balok', 'ukuran' => '5x10x4'],
            ['nama' => 'kayu putih balok', 'ukuran' => '5x10x3'],
            ['nama' => 'kayu putih balok', 'ukuran' => '5x5x4'],
            ['nama' => 'kayu putih papan', 'ukuran' => '20x2x4'],
            ['nama' => 'kayu putih papan', 'ukuran' => '20x2.5x4'],
        ];

        foreach ($data as $item) {
            Barang::create($item);
        }
    }
}
