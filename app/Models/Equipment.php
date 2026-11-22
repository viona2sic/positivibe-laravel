<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';

    protected $fillable = [
        'name',
        'category',
        'description',
        'rental_price',
        'stock',
        'condition',
        'image',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'rental_price' => 'decimal:2',
            'stock' => 'integer',
            'is_available' => 'boolean',
        ];
    }

    public function reservationEquipment(): HasMany
    {
        return $this->hasMany(ReservationEquipment::class, 'equipment_id');
    }
}
