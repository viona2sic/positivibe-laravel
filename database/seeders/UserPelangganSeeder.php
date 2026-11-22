<?php

namespace Database\Seeders;

use App\Models\UserPelanggan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserPelangganSeeder extends Seeder
{
    public function run(): void
    {
        $pelanggan = [
            [
                'name'      => 'Budi Santoso',
                'email'     => 'budi@example.com',
                'password'  => Hash::make('password'),
                'phone'     => '081311111111',
                'address'   => 'Jl. Merdeka No. 10, Jakarta Pusat',
                'is_active' => true,
            ],
            [
                'name'      => 'Siti Rahayu',
                'email'     => 'siti@example.com',
                'password'  => Hash::make('password'),
                'phone'     => '081322222222',
                'address'   => 'Jl. Pahlawan No. 25, Bandung',
                'is_active' => true,
            ],
            [
                'name'      => 'Ahmad Fauzi',
                'email'     => 'ahmad@example.com',
                'password'  => Hash::make('password'),
                'phone'     => '081333333333',
                'address'   => 'Jl. Sudirman No. 7, Surabaya',
                'is_active' => true,
            ],
        ];

        foreach ($pelanggan as $data) {
            UserPelanggan::create($data);
        }
    }
}
