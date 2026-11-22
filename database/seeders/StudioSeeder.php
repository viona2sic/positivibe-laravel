<?php

namespace Database\Seeders;

use App\Models\Studio;
use App\Models\StudioSchedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StudioSeeder extends Seeder
{
    public function run(): void
    {
        $studios = [
            [
                'name'        => 'Studio A - Rock Zone',
                'slug'        => 'studio-a-rock-zone',
                'description' => 'Studio rekaman dan latihan musik rock dengan peralatan lengkap, ruangan kedap suara premium, dan monitor speaker berkualitas tinggi.',
                'hourly_rate' => 100000,
                'capacity'    => 8,
                'image'       => null,
                'status'      => 'active',
            ],
            [
                'name'        => 'Studio B - Jazz Corner',
                'slug'        => 'studio-b-jazz-corner',
                'description' => 'Studio suasana jazz klasik yang nyaman, dilengkapi grand piano, drum set, dan sistem akustik terbaik untuk eksplorasi genre jazz.',
                'hourly_rate' => 120000,
                'capacity'    => 6,
                'image'       => null,
                'status'      => 'active',
            ],
            [
                'name'        => 'Studio C - Pop Studio',
                'slug'        => 'studio-c-pop-studio',
                'description' => 'Studio modern serba bisa untuk genre pop, R&B, dan EDM. Dilengkapi keyboard synthesizer, drum elektrik, dan recording interface.',
                'hourly_rate' => 90000,
                'capacity'    => 10,
                'image'       => null,
                'status'      => 'active',
            ],
        ];

        foreach ($studios as $studioData) {
            $studio = Studio::create($studioData);

            // Generate schedules for 7 days starting from tomorrow
            for ($day = 1; $day <= 7; $day++) {
                $date = Carbon::today()->addDays($day)->toDateString();

                // Slots per hour 09:00 - 22:00 (each slot = 1 hour)
                for ($hour = 9; $hour < 22; $hour++) {
                    $startTime = sprintf('%02d:00:00', $hour);
                    $endTime   = sprintf('%02d:00:00', $hour + 1);

                    StudioSchedule::create([
                        'studio_id'  => $studio->id,
                        'date'       => $date,
                        'start_time' => $startTime,
                        'end_time'   => $endTime,
                        'price'      => $studioData['hourly_rate'],
                        'status'     => 'available',
                    ]);
                }
            }
        }
    }
}
