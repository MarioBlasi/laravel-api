<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        for ($i = 0; $i < 10; $i++) {

            $post = new Post();
            $post->title = $faker->sentence(3);
            $post->slug = Str::slug($post->title, '-'); 
            $post->content = $faker->paragraphs(asText: true); 
            $post->cover_image = 'placeholders/'->imageUrl('storage/app/public/placeholders', fullPath:false, category:
             'Posts', format:'jpg', word:$post->title, red:true);
            $post->save();
        }
    }
}
