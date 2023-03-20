<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Livreur;
use App\Models\image_restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::create([
            'id_restaurant' =>'12344',
            'NameRestaurant' => 'restaurant Oulad Teima',
            'Country' => 'Morroco',
            'Regions' => 'Souss-Massa',
            'city' => 'Oulad Teima',
            'Address' => '9QRH+6HJ, N10, Oulad Teima',
            'id_manager' => '2345',
            'PriceDelivery' => '09',
            'deliverytime_of' => '15',
            'deliverytime_to' => '25',
            'NumberLike' => '0',
        ]);

        Livreur::create([
            'id_restaurant' =>'12344',
            'id_livreur' => '3456',
        ]);

        image_restaurant::create([
            'id_restaurant' =>'12344',
            'Photo' => '1677457035.png',
        ]);

        image_restaurant::create([
            'id_restaurant' =>'12344',
            'Photo' => '1677457041.png',
        ]);

        image_restaurant::create([
            'id_restaurant' =>'12344',
            'Photo' => '1677457046.png',
        ]);

        Restaurant::create([
            'id_restaurant' =>'23455',
            'NameRestaurant' => 'food Oulad Teima',
            'Country' => 'Morroco',
            'Regions' => 'Souss-Massa',
            'city' => 'Oulad Teima',
            'Address' => '9QRH+6HJ, N10, Oulad Teima',
            'id_manager' => '6789',
            'PriceDelivery' => '0',
            'deliverytime_of' => '20',
            'deliverytime_to' => '30',
            'NumberLike' => '0',
        ]);

        Livreur::create([
            'id_restaurant' =>'23455',
            'id_livreur' => '4567',
        ]);
        
        image_restaurant::create([
            'id_restaurant' =>'23455',
            'Photo' => '1677457052.jpg',
        ]);

        image_restaurant::create([
            'id_restaurant' =>'23455',
            'Photo' => '1677457058.jpg',
        ]);

        image_restaurant::create([
            'id_restaurant' =>'23455',
            'Photo' => '1678536426.jpg',
        ]);
    }
}
