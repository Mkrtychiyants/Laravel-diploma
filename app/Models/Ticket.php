<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_session_id',
        'seat_id',
        'final_seat_number',
        'price',
        'is_selected',
        'is_purchased',
        'is_vip',
        'is_blocked',
    ];

    public function movieSessions(): BelongsTo
    {
        return $this->belongsTo(MovieSessions::class);
    }
    
    public function seats(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }



}
