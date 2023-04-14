<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;

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
        Person::create([
            'id_people' => '1234',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'admin',
            'Email' => 'admin@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Admin',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '2345',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'manager1',
            'Email' => 'manager1@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Manager',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '6789',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'manager2',
            'Email' => 'manager2@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Manager',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '67891',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'manager3',
            'Email' => 'manager3@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Manager',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '678914',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'manager4',
            'Email' => 'manager4@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Manager',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '6789145',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'manager5',
            'Email' => 'manager5@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Manager',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '3456',
            'FullName' => '',
            'Country' => 'Morroco',
            'Regions' => 'Souss-Massa',
            'city' => 'Oulad Teima',
            'Address' => '',
            'UserName' => 'livreur1',
            'Email' => 'livreur1@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Liverour',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '4567',
            'FullName' => '',
            'Country' => 'Morroco',
            'Regions' => 'Souss-Massa',
            'city' => 'Oulad Teima',
            'Address' => '',
            'UserName' => 'livreur2',
            'Email' => 'livreur2@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Liverour',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);

        Person::create([
            'id_people' => '5678',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'user',
            'Email' => 'user@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'User',
            'Telf' => '',
            'Photo' => 'Users.png',
            'star' => '0',
        ]);
    }
}
