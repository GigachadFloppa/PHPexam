<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moderator = Role::where('name', 'admin')->value('id');
        $reader = Role::where('name', 'user')->value('id');

        $user1 = new User();
        $user1->username = 'yaro';
        $user1->email = 'moosbeere_O@mail.ru';
        $user1->password = Hash::make(123456789);
        $user1->role_id = $moderator;
        $user1->save();

        $user2 = new User();
        $user2->username = 'Vova';
        $user2->email = 'vova@mail.ru';
        $user2->password = Hash::make(123456);
        $user2->role_id = $reader;
        $user2->save();
    }
}
