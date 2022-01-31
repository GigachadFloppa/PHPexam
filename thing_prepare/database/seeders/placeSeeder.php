<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class placeSeeder extends Seeder
{
    public function run()
    {
        $place1 = new Place();
        $place1->name = 'svalka';
        $place1->description = 'simple svalka';
        $place1->repair = 'smth';
        $place1->work = false;
        $place1->save();

        $place2 = new Place();
        $place2->name = 'mouka';
        $place2->description = 'aimple moyka';
        $place2->repair = 'smth';
        $place2->work = false;
        $place2->save();
    }
}
