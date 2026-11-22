<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'booking_code',
        'user_pelanggan_id',
        'studio_id',
        'total_amount',
        'status',
        'notes',
        'expires_at',
        'reminder_sent_at',
        'checked_in_at',
        'checked_in_by',
    ];

    protected function casts(): array
    {
        return [
            'total_amount' => 'decimal:2',
            'expires_at' => 'datetime',
            'reminder_sent_at' => 'datetime',
            'checked_in_at' => 'datetime',
        ];
    }

    public function userPelanggan(): BelongsTo
    {
        return $this->belongsTo(UserPelanggan::class, 'user_pelanggan_id');
    }

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class, 'studio_id');
    }

    public function checkedInByAdmin(): BelongsTo
    {
        return $this->belongsTo(UserAdmin::class, 'checked_in_by');
    }

    public function reservationSlots(): HasMany
    {
        return $this->hasMany(ReservationSlot::class, 'reservation_id');
    }

    public function reservationEquipment(): HasMany
    {
        return $this->hasMany(ReservationEquipment::class, 'reservation_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'reservation_id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'reservation_id');
    }
}
