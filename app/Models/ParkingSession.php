<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSession extends Model
{
    public function vehicle()
{
    return $this->belongsTo(Vehicle::class);
}

public function parkingSlot()
{
    return $this->belongsTo(ParkingSlot::class);
}
}
