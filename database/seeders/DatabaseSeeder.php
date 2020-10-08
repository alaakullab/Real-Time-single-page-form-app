<?php

namespace Database\Seeders;
use App\Models\Like;
use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use App\Models\Reply;
use Faker\Factory;
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
        User::factory(10)->create();
        Category::factory(10)->create();
        Question::factory(10)->create();
        Reply::factory(10)->create()->each(
            function ($reply){
                return $reply->like()->save(Like::factory()->create());
            }
        );
    }
}
