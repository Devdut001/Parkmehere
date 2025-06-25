<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParkingSlot;

class ParkingSlotSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            ParkingSlot::create([
                'slot_number' => 'A' . $i,
                'is_available' => true,
            ]);
        }
    }
}