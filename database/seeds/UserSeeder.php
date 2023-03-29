<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    \App\User::create([
			'fio' => 'Иванов Иван Иванович',
			'login' => 'ivan',
			'email' => 'example@gmail.com',
			'password' => Hash::make('password'),
			'role' => 2
		]);
        \App\User::create([
            'fio' => 'Михайлова Татьяна Юрьевна',
            'login' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('admin'),
            'role' => 1
        ]);
    }
}
