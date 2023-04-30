<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $users = [
            [
            'username' => 'Admin Fajar',
            'email' => 'fajarocta40@gmail.com',
            'companyname' => 'test',
            'images' => 'test',
            'password' => bcrypt('password'),
             'location' => 'test',
              'long' => 'test',
               'lat' => 'test',
                'jamBuka' => '08:00',
                 'jamTutup' => '04:00',
          ],
            [
            'username' => 'dedy',
            'email' => 'dedysetiawan@gmail.com',
            'companyname' => 'test',
            'images' => 'test',
            'password' => bcrypt('password123'),
             'location' => 'test',
              'long' => 'test',
               'lat' => 'test',
                'jamBuka' => '08:00',
                 'jamTutup' => '04:00',
            ],
        ];
            foreach ($users as $key => $user){
                User::create($user);
            }
        }
}
