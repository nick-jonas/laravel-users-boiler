<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Sam',
            'email'    => 'sam@uccbm.com',
            'password' => Hash::make('internet'),
        ));

        User::create(array(
            'name'     => 'Nick',
            'email'    => 'njonas45@gmail.com',
            'password' => Hash::make('unicorns'),
            'social_id' => 'njonas',
            'social_type' => 1
        ));
    }

}
