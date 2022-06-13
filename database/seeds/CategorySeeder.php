<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
        ["tema" => "Orrore", "hashtag"=> "#brividi #fantasmi"],
        ["tema" => "Fantascienza", "hashtag"=> "#alieni #SciFi"],
        ["tema" => "Dramma", "hashtag"=> "#tensione #noia"],
        ];
        foreach ($categories as $key => $category) {
            $newCategory = new Category();
            $newCategory->tema = $category["tema"];
            $newCategory->hashtag = $category["hashtag"];
            $newCategory->save();
        }
    }
}
