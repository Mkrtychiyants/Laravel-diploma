<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'row',
        'price', 
        'is_vip',
        'is_blocked',
    ];
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class);
    }
}
