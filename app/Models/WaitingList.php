<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WaitingList extends Model
{
    use HasFactory;

    protected $table = 'waiting_lists';

    protected $fillable = [
        'user_pelanggan_id',
        'studio_id',
        'studio_schedule_id',
        'requested_date',
        'status',
        'notified_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'requested_date' => 'date',
            'notified_at' => 'datetime',
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

    public function studioSchedule(): BelongsTo
    {
        return $this->belongsTo(StudioSchedule::class, 'studio_schedule_id');
    }
}
