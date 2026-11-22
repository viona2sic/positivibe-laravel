<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudioSchedule extends Model
{
    use HasFactory;

    protected $table = 'studio_schedules';

    protected $fillable = [
        'studio_id',
        'date',
        'start_time',
        'end_time',
        'price',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'price' => 'decimal:2',
        ];
    }

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class, 'studio_id');
    }

    public function reservationSlots(): HasMany
    {
        return $this->hasMany(ReservationSlot::class, 'studio_schedule_id');
    }

    public function waitingLists(): HasMany
    {
        return $this->hasMany(WaitingList::class, 'studio_schedule_id');
    }
}
