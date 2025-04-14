<?php

namespace Bagisto\Pickup\Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickupTimeslotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $weekdays = [1, 2, 3, 4, 5]; // Monday to Friday

        foreach ($weekdays as $day) {
            for ($hour = 10; $hour < 18; $hour++) {
                DB::table('pickup_timeslots')->insert([
                    'inventory_source_id' => 1,
                    'pickup_day'          => $day,
                    'start_time'          => sprintf('%02d:00:00', $hour),
                    'end_time'            => sprintf('%02d:00:00', $hour + 1),
                    'pickup_quota'        => $faker->numberBetween(1, 10),
                    'created_at'          => now(),
                    'updated_at'          => now(),
                ]);
            }
        }
    }
}
