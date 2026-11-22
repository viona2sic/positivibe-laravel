<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationSlot extends Model
{
    use HasFactory;

    protected $table = 'reservation_slots';

    protected $fillable = [
        'reservation_id',
        'studio_schedule_id',
        'price',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function studioSchedule(): BelongsTo
    {
        return $this->belongsTo(StudioSchedule::class, 'studio_schedule_id');
    }
}
