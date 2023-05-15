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

        //  admin
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
            'customer' => '0',
        ]);

        // manager
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
            'customer' => '0',
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
            'customer' => '0',
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
            'customer' => '0',
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
            'customer' => '0',
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
            'customer' => '0',
        ]);

        // chef
        Person::create([
            'id_people' => '67891451',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'chef1',
            'Email' => 'chef1@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Chef',
            'Telf' => '',
            'Photo' => 'Users.png',
            'customer' => '0',
        ]);

        Person::create([
            'id_people' => '67891452',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'chef2',
            'Email' => 'chef2@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Chef',
            'Telf' => '',
            'customer' => '0',
            'Photo' => 'Users.png'
        ]);

        Person::create([
            'id_people' => '67891453',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'chef3',
            'Email' => 'chef3@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Chef',
            'Telf' => '',
            'Photo' => 'Users.png',
            'customer' => '0',
        ]);

        Person::create([
            'id_people' => '67891454',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'chef4',
            'Email' => 'chef4@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Chef',
            'Telf' => '',
            'Photo' => 'Users.png',
            'customer' => '0',
        ]);

        Person::create([
            'id_people' => '67891455',
            'FullName' => '',
            'Country' => '',
            'Regions' => '',
            'city' => '',
            'Address' => '',
            'UserName' => 'chef5',
            'Email' => 'chef5@gmail.com',
            'Password' => Hash::make('1234'),
            'User_Group' => 'Chef',
            'Telf' => '',
            'Photo' => 'Users.png',
            'customer' => '0',
        ]);

        // liverour
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
            'customer' => '0',
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
            'customer' => '0',
        ]);

        // user
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
            'customer' => '0',
        ]);
    }
}
