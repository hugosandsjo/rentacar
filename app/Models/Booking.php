<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'passengers',
        // 'car_id',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Car::class);
    // }
}
