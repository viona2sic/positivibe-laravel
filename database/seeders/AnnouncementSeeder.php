<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\UserAdmin;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $admin = UserAdmin::first();

        $announcements = [
            [
                'user_admin_id' => $admin?->id,
                'title'         => 'Promo Spesial Akhir Tahun – Diskon 20% untuk Semua Studio!',
                'slug'          => 'promo-spesial-akhir-tahun-diskon-20',
                'content'       => 'Rayakan akhir tahun bersama PositiVibe Studio! Dapatkan diskon 20% untuk setiap sesi booking studio di bulan Desember 2026. Promo berlaku untuk semua studio: Studio A Rock Zone, Studio B Jazz Corner, dan Studio C Pop Studio. Gunakan kode promo POSITIYEAR2026 saat checkout. Penawaran terbatas, segera booking sekarang!',
                'target'        => 'all',
                'is_published'  => true,
                'published_at'  => Carbon::now(),
            ],
            [
                'user_admin_id' => $admin?->id,
                'title'         => 'Jadwal Perawatan Studio B – 30 November 2026',
                'slug'          => 'jadwal-perawatan-studio-b-30-november-2026',
                'content'       => 'Kami ingin menginformasikan bahwa Studio B – Jazz Corner akan menjalani jadwal perawatan rutin pada tanggal 30 November 2026 pukul 08.00 – 12.00 WIB. Selama masa perawatan, studio tidak dapat digunakan. Grand piano akan di-tuning oleh teknisi profesional dan sistem akustik ruangan akan diperbarui. Mohon maaf atas ketidaknyamanan ini. Booking tetap dapat dilakukan untuk sesi mulai pukul 13.00 WIB.',
                'target'        => 'all',
                'is_published'  => true,
                'published_at'  => Carbon::now()->subDays(1),
            ],
            [
                'user_admin_id' => $admin?->id,
                'title'         => 'Selamat Datang di PositiVibe Studio – Platform Reservasi Baru Kami!',
                'slug'          => 'selamat-datang-di-positivibe-studio-platform-reservasi-baru',
                'content'       => 'Kami dengan bangga memperkenalkan platform reservasi online baru PositiVibe Studio! Kini Anda dapat memesan studio musik favorit dengan mudah, cepat, dan transparan langsung dari genggaman tangan Anda. Nikmati fitur-fitur unggulan: pilih jadwal fleksibel per jam, tambahkan sewa alat musik, lacak status booking secara real-time, dan terima notifikasi pengingat otomatis. Daftar sekarang dan dapatkan sesi pertama Anda dengan harga spesial member baru!',
                'target'        => 'all',
                'is_published'  => true,
                'published_at'  => Carbon::now()->subDays(3),
            ],
        ];

        foreach ($announcements as $data) {
            Announcement::create($data);
        }
    }
}
