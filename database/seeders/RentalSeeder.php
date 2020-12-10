<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->insert([
            'name' => 'Castle House',
            'weekend_price' => '200',
            'weekday_price' => '150',
            'description' => '20x20 Bounce House, perfect for larger gatherings!',
            'image' => '/img/castle.png'
        ]);
        DB::table('rentals')->insert([
            'name' => 'Mickey Mouse House',
            'weekend_price' => '150',
            'weekday_price' => '100',
            'description' => '15x15 Bounce House, for the Disney lover in your life!',
            'image' => '/img/mickey.png'
        ]);
    }
}
