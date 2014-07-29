<?php

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'first_name'     => 'Sam',
            'last_name'      => 'Dostart',
            'email'    => 'sam@uccbm.com',
            'password' => Hash::make('internet'),
        ));

        User::create(array(
            'first_name'     => 'Nick',
            'last_name'      => 'Jonas',
            'email'    => 'njonas45@gmail.com',
            'password' => Hash::make('unicorns'),
            'social_id' => 'njonas',
            'social_type' => 1
        ));
    }

}
