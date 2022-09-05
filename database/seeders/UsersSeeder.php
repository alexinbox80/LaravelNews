<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData(): array
    {
        $users = [];

        $faker = Factory::create('ru_RU');

        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        $users[1] = [
            'name'        => 'Администратор',
            'email'       => 'alexinbox80@inbox.ru',
            'is_admin'    => User::IS_ADMIN,
            'password'    => Hash::make('12345678'),
            'email_verified_at' => now('Europe/Moscow'),
            'created_at'  => now('Europe/Moscow')
        ];

        $users[2] = [
            'name'        => 'Пользователь',
            'email'       => 'qw@qw.ru',
            'is_admin'    => User::IS_USER,
            'password'    => Hash::make('12345678'),
            'email_verified_at' => now('Europe/Moscow'),
            'created_at'  => now('Europe/Moscow')
        ];

        for ($i = 3; $i <= 20; $i++) {
            $users[$i] = [
                'name'        => $faker->userName(),
                'email'       => $faker->email(),
                'is_admin'    => User::IS_USER,
                'password'    => Hash::make('12345678'),
                'email_verified_at' => now('Europe/Moscow'),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $users;
    }
}
