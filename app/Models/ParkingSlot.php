<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSlot extends Model
{
    public function sessions()
{
    return $this->hasMany(ParkingSession::class);
}
}
