<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemPizza;
use App\Models\Pizza;
use App\Models\Unit;
use Illuminate\Database\Seeder;

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
            ['id' => 1, 'unit_id' => 2, 'name' => 'deeg', 'price' => 0.88],
            ['id' => 2, 'unit_id' => 4, 'name' => 'ui', 'price' => 0.58],
            ['id' => 3, 'unit_id' => 4, 'name' => 'kaas', 'price' => 1.08],
            ['id' => 4, 'unit_id' => 5, 'name' => 'olijven', 'price' => 0.28],
            ['id' => 5, 'unit_id' => 2, 'name' => 'tonijn', 'price' => 1.28],
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

    }
}
