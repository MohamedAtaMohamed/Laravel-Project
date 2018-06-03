<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
           'name'       => 'mohamed',
            'email'     => 'mohamed@gmail.com',
            'password'  => bcrypt('123456'),
            'admin'     => 1,
        ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'     => 'uploads/avatars/1.jpeg',
            'about'      => "I'm mohamed Ata From Egypt And web developer",
            'facebook'   => 'facebook.com',
            'youtube'    => 'youtube.com'
        ]);
    }
}
