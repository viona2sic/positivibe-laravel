<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserPelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users_pelanggan';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'user_pelanggan_id');
    }

    public function waitingLists(): HasMany
    {
        return $this->hasMany(WaitingList::class, 'user_pelanggan_id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'user_pelanggan_id');
    }
}
