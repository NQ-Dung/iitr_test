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
        // Delete all existing records before seeding
        User::truncate();

        // Making some sample users. We wouldn't want to use random or Faker here
        $users = [
            [
                'name' => 'User01',
                'email' => 'email01@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User02',
                'email' => 'email02@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User03',
                'email' => 'email03@example.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach($users as $user){
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }
}
