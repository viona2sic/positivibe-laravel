<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Studio extends Model
{
    use HasFactory;

    protected $table = 'studios';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'hourly_rate',
        'capacity',
        'image',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'hourly_rate' => 'decimal:2',
            'capacity' => 'integer',
        ];
    }

    public function studioSchedules(): HasMany
    {
        return $this->hasMany(StudioSchedule::class, 'studio_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'studio_id');
    }

    public function waitingLists(): HasMany
    {
        return $this->hasMany(WaitingList::class, 'studio_id');
    }
}
