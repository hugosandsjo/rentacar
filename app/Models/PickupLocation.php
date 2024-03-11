<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'longitude',
        'latitude'

    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
