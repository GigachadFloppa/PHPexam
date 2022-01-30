<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moderator = new Role();
        $moderator->name = 'admin';
        $moderator->save();

        $reader = new Role();
        $reader->name = 'user';
        $reader->save();
    }
}
