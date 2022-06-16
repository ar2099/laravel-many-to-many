<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Traduttore;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TraduttoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $lingue = ["inglese", "spagnolo", "tedesco", "francese", "portoghese"];
        for ($i=0; $i < 5 ; $i++) { 
            $traduttore = new Traduttore();
            $traduttore->nome = $faker->name();
            $traduttore->lingua = $lingue[$i];
            $traduttore->save();
        }
    }
}
