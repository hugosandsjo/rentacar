<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['max_passengers', 'brand', 'model', 'price', 'fileName', 'image'];


    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
