<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemPizza;
use App\Models\Pizza;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $units = [
            ['id' => 1, 'name' => '1 gram'],
            ['id' => 2, 'name' => '100 gram'],
            ['id' => 3, 'name' => '1 stuk'],
            ['id' => 4, 'name' => '5 stuk'],
            ['id' => 5, 'name' => '10 stuk'],
        ];
        foreach ($units as $unit) {
            Unit::create($unit);
        }

        $items = [
            ['id' => 1, 'unit_id' => 2, 'name' => 'deeg', 'price' => 88],
            ['id' => 2, 'unit_id' => 4, 'name' => 'ui', 'price' => 58],
            ['id' => 3, 'unit_id' => 4, 'name' => 'kaas', 'price' => 108],
            ['id' => 4, 'unit_id' => 5, 'name' => 'olijven', 'price' => 28],
            ['id' => 5, 'unit_id' => 2, 'name' => 'tonijn', 'price' => 128],
        ];
        foreach ($items as $item) {
            Item::create($item);
        }

        $pizzas = [
            ['id' => 1, 'name' => 'basis'],
            ['id' => 2, 'name' => 'margarita'],
            ['id' => 3, 'name' => 'tonno'],
        ];
        foreach ($pizzas as $pizza) {
            Pizza::create($pizza);
        }

        $itemPizzas = [
            ['item_id' => 1, 'pizza_id' => 1],
            ['item_id' => 1, 'pizza_id' => 2],
            ['item_id' => 2, 'pizza_id' => 2],
            ['item_id' => 3, 'pizza_id' => 2],
            ['item_id' => 1, 'pizza_id' => 3],
            ['item_id' => 2, 'pizza_id' => 3],
            ['item_id' => 3, 'pizza_id' => 3],
            ['item_id' => 4, 'pizza_id' => 3],
            ['item_id' => 5, 'pizza_id' => 3],
        ];
        foreach ($itemPizzas as $itemPizza) {
            ItemPizza::create($itemPizza);
        }

        $users = [
            ['name' => 'admin', 'email' => 'admin@test.test', 'password' => Hash::make('password')],
            ['name' => 'test', 'email' => 'test@test.test', 'password' => Hash::make('password')],

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
