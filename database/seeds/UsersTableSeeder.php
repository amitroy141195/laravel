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
        $user= App\User::create([
        	   'name'      =>  'Amit Roy',
        	   'email'     =>  'amit@gmail.com',
        	   'password'  =>  bcrypt('password'), 
               'admin'     =>  1

        ]);


        App\Profile::create([

            'user_id'  => $user->id,
            'avatar'   => 'uploads/avatars/1535626103images (6).jpeg',
            'about'    => 'abhujfd dfjhdf jhdfjkdf jkhdfkjdfh bnjkna  jk',
            'facebook' => 'https://www.facebook.com/',
            'youtube'  => 'https://www.youtube.com/'

        ]);
    }
}
