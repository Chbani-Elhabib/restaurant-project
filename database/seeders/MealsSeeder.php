<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\meal;

class MealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        meal::create([
            'id_meal' => '9876',
            'NameFood' => 'Chicken Pizza',
            'Description' => 'HERE FOR A LIMITED TIME ONLY!
                            Buffalo Chicken Pizza features our original crust topped with a mixture of ranch dressing and buffalo wing sauce, 
                            a blend of 100% natural part-skim mozzarella and Monterey Jack cheeses, and a generous portion of 100% all-natural chicken breast.',
            'Price' => '12.99',
            'TypeFood' => 'pizza',
            'Photo' => '1.png',
            'NumberLike' => '0',
        ]);

        meal::create([
            'id_meal' => '8765',
            'NameFood' => 'Burgers',
            'Description' => 'veganica patty made of lentil and dried tomatoes,
                                vegi mayo sauce with chives and BBQ sauce, lettuce, tomato, red onion,
                                and red cabbage. Served in durum bun with sesame.',
            'Price' => '11.99',
            'TypeFood' => 'Burger',
            'Photo' => '2.png',
            'NumberLike' => '0',
        ]);

        meal::create([
            'id_meal' => '7654',
            'NameFood' => 'Desserts',
            'Description' => 'Doughnuts stuffed with hazelnut chocolate then covered in cinnamon and sugar. Serving contain 8-10 doughnuts.',
            'Price' => '15',
            'TypeFood' => 'Desserts',
            'Photo' => '3.png',
            'NumberLike' => '0',
        ]);

        meal::create([
            'id_meal' => '6543',
            'NameFood' => 'Cappucino',
            'Description' => 'Cappuccino is a popular espresso-based coffee drink that originated in Italy.
                            It is made by combining espresso, steamed milk, and frothed milk,
                            creating a rich and creamy texture with a layer of velvety foam on top.
                            The base of cappuccino is a shot of espresso,
                            which is extracted from finely ground coffee beans under high pressure.
                            This espresso is then mixed with equal parts of steamed milk and frothed milk,
                            which are created by heating and aerating milk using a steam wand on an espresso machine.
                            The combination of espresso, steamed milk,
                            and frothed milk creates a deliciously smooth and velvety texture that is both rich and creamy.
                            The frothed milk also creates a layer of foam on top of the cappuccino,
                            which can be dusted with cocoa powder or cinnamon for added flavor.
                            Cappuccino is a versatile coffee drink that can be enjoyed hot or cold and can be customized to suit individual preferences.
                            It can be made with different types of milk,
                            such as whole milk, skim milk, or non-dairy alternatives like soy or almond milk,
                            depending on dietary requirements or personal preference.
                            Overall, cappuccino is a delicious and satisfying coffee drink that is perfect for any time of the day,
                            whether you need a morning pick-me-up or an afternoon treat.',
            'Price' => '08',
            'TypeFood' => 'Beverages',
            'Photo' => '4.png',
            'NumberLike' => '0',
        ]);

        meal::create([
            'id_meal' => '5432',
            'NameFood' => 'Sandwiches',
            'Description' => 'Sandwiches are a popular type of food that typically consists of one or more types of fillings,
                                such as meats, vegetables, cheeses, spreads, and condiments,
                                placed between two slices of bread or inside a bread roll.
                                The bread can be toasted or untoasted,
                                and there are many different types of bread that can be used,
                                including white, whole wheat, rye, and sourdough.',
            'Price' => '30',
            'TypeFood' => 'Sandwiches',
            'Photo' => '5.png',
            'NumberLike' => '0',
        ]);


        meal::create([
            'id_meal' => '4321',
            'NameFood' => 'Seafood Platter With Mango Salsa',
            'Description' => 'Succulent lobster,
                            juicy tiger prawns and Pacific oysters make a show-stopping platter with fresh mango salsa and spicy horseradish mayo.',
            'Price' => '90',
            'TypeFood' => 'Seafood',
            'Photo' => '6.png',
            'NumberLike' => '0',
        ]);

        meal::create([
            'id_meal' => '3210',
            'NameFood' => 'Vegan Kimchi Noodle Soup',
            'Description' => 'This kimchi soup has a rich and flavorful broth (think spicy, sweet, and rich),
                            chewy noodles, tofu, mushrooms, and greens. The broth is flavored with kimchi, ginger, and garlic.
                            It is so delicious you will ask for a second round!',
            'Price' => '60',
            'TypeFood' => 'Soup',
            'Photo' => '7.png',
            'NumberLike' => '0',
        ]);

        meal::create([
            'id_meal' => '2109',
            'NameFood' => 'sandwich and coca cola and frit',
            'Description' => 'Sandwich: A sandwich is a popular food item that consists of one or more fillings,
                                such as meats, vegetables, cheeses, or spreads, placed between two slices of bread.
                                The bread can be toasted or untoasted, and there are many different varieties of bread that can be used.
                                Sandwiches are often enjoyed as a quick and easy meal or snack and can be customized to suit a wide range of tastes.

                                Coca-Cola: Coca-Cola is a popular carbonated soft drink that has been enjoyed around the world for over a century.
                                It has a distinct sweet and refreshing taste that is made from a secret blend of natural flavors,
                                including vanilla and cinnamon. Coca-Cola is often served cold and is a popular beverage choice for meals,
                                snacks, and social gatherings.
            
                                Frit: Frit, or fritters,
                                are a type of fried food that are typically made by combining a batter or dough with various ingredients,
                                such as fruits, vegetables, or meats. The mixture is then deep-fried until it is crispy and golden brown.
                                Fritters can be sweet or savory, depending on the ingredients used, and are often served as a snack or appetizer.
                                Some popular types of fritters include apple fritters, corn fritters, and shrimp fritters.',
            'Price' => '55',
            'TypeFood' => 'dish',
            'Photo' => '8.png',
            'NumberLike' => '0',
        ]);

        meal::create([
            'id_meal' => '1098',
            'NameFood' => 'Mediterranean Salad',
            'Description' => 'So healthy and delicious, this Mediterranean Salad comes together in literally 10 minutes flat.
                              It is perfect as a light meal or will accompany just about any main dish!',
            'Price' => '40',
            'TypeFood' => 'Salad',
            'Photo' => '9.png',
            'NumberLike' => '0',
        ]);

    }
}
