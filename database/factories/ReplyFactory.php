<?php

namespace Database\Factories;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $word = $this->faker->word;
        return [
            'body' => $word,
            'question_id' => function (){
                return \App\Models\Question::all()->random();
            },
            'user_id' => function () {
                return \App\Models\User::all()->random();
            },
        ];
    }
}
