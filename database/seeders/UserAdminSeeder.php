<?php

namespace Database\Seeders;

use App\Models\UserAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    public function run(): void
    {
        UserAdmin::create([
            'name'      => 'Super Admin',
            'email'     => 'admin@positivibe.com',
            'password'  => Hash::make('password'),
            'phone'     => '081200000001',
            'role'      => 'superadmin',
            'is_active' => true,
        ]);
    }
}
