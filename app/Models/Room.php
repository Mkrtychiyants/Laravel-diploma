<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;




class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'rows',
        'columns',
        'created_at',
        'updated_at',
    ];
    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }
    
    public function movieSessions(): HasMany
    {
        return $this->hasMany(MovieSession::class);
    }
    

}
