<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Traduttore;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck("id")->toArray();
        // $traduttore_ids = Traduttore::pluck("id")->toArray();

        for ($i=0; $i < 20 ; $i++) { 
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            // $post->traduttores()->sync( Arr::random($traduttore_ids) );
            $post->author = $faker->name();
            $post->data = $faker->date();
            $post->title = $faker->sentence();
            $post->text = $faker->text(300);
            $post->slung = Str::slug($post->title, '-');
            // $post->image = $faker->imageUrl(250, 250);
            $post->save();
        }
    }
}
