<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            userSeeder::class,
            placeSeeder::class,
        ]);
    }


//    public function run()
//    {
//        User::factory()->create();
//        Article::factory()->count(5)->create(); or  \App\Models\User::factory(10)->create();
//    }
//}
}
