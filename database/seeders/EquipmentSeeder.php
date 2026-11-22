<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $equipment = [
            [
                'name'         => 'Gitar Elektrik Gibson Les Paul',
                'category'     => 'guitar',
                'description'  => 'Gitar elektrik Gibson Les Paul Standard, kondisi prima, cocok untuk genre rock dan blues.',
                'rental_price' => 25000,
                'stock'        => 2,
                'condition'    => 'good',
                'image'        => null,
                'is_available' => true,
            ],
            [
                'name'         => 'Bass Elektrik Fender Precision',
                'category'     => 'bass',
                'description'  => 'Bass elektrik Fender Precision dengan suara khas yang jernih dan responsif, cocok untuk berbagai genre.',
                'rental_price' => 20000,
                'stock'        => 2,
                'condition'    => 'good',
                'image'        => null,
                'is_available' => true,
            ],
            [
                'name'         => 'Drum Set Pearl Export',
                'category'     => 'drum',
                'description'  => 'Drum set Pearl Export 5-piece dengan cymbal Zildjian A-series. Siap pakai untuk sesi latihan intensif.',
                'rental_price' => 30000,
                'stock'        => 1,
                'condition'    => 'good',
                'image'        => null,
                'is_available' => true,
            ],
            [
                'name'         => 'Keyboard Yamaha PSR-S970',
                'category'     => 'keyboard',
                'description'  => 'Keyboard arranger Yamaha PSR-S970 dengan 61 tuts dan ribuan suara built-in, dilengkapi stand dan sustain pedal.',
                'rental_price' => 35000,
                'stock'        => 1,
                'condition'    => 'good',
                'image'        => null,
                'is_available' => true,
            ],
            [
                'name'         => 'Mikrofon Shure SM58',
                'category'     => 'microphone',
                'description'  => 'Mikrofon vokal dinamis Shure SM58 legendaris, sudah termasuk kabel XLR 5 meter dan stand microphone.',
                'rental_price' => 15000,
                'stock'        => 4,
                'condition'    => 'good',
                'image'        => null,
                'is_available' => true,
            ],
        ];

        foreach ($equipment as $item) {
            Equipment::create($item);
        }
    }
}
