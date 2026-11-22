<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserAdminSeeder::class,
            UserPelangganSeeder::class,
            StudioSeeder::class,       // sekaligus buat studio_schedules
            EquipmentSeeder::class,
            AnnouncementSeeder::class, // harus setelah UserAdminSeeder
        ]);
    }
}
