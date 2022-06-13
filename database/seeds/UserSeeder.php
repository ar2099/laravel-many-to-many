<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = 'Andrea';
        $user->email = 'andrea@andrea.it';
        $user->password = bcrypt('andrea');
        $user->save();
    }
}
