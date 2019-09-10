<?php

use App\Category;
use App\Country;
use App\Manufacturer;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxCategory = Category::max('id');
        $maxManufacturer = Manufacturer::max('id');
        $maxCountry = Country::max('id');
        for ($i=0; $i < 100000; $i++) {
            Product::create([
                'sku' => Str::random(15),
                'name' => Str::random(8),
                'description' => Str::random(6).' '.Str::random(6).' '.Str::random(6).' '.Str::random(6).' '.Str::random(6).' '.Str::random(6).' '.Str::random(6).' '.Str::random(6),
                'color' => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
                'category_id' => rand(1, $maxCategory),
                'manufacturer_id' => rand(1, $maxManufacturer),
                'country_id' => rand(1, $maxCountry)
            ]);
        }
    }
}
