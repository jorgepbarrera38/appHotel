<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'number' => 1,
            'price' => 30000,
            'maxpeople' => 3,
            'description' => 'landitiis nobis dolorum? Illum magnam, iste amet porro sint totam aperiam iure dolor pariatur, maxime eum? Nisi, esse!',
            'type'  => 'Individual'                              
        ]);
        Room::create([
            'number' => 2,
            'price' => 25000,
            'maxpeople' => 1,
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa, porro iste repellat sapiente atque blanditiis do',
            'type'  => 'Familiar'
        ]);
        Room::create([
            'number' => 3,
            'price' => 40000,
            'maxpeople' => 4,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit labore et incidunt e tempora libero dolorem neque blanditiis, doloremque corporis sequi, maxime facere',
            'type'  => 'Familiar'
        ]);
    }
}
