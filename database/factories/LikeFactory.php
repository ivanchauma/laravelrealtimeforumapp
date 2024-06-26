<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => function(){
                return User::all()->random();
            },
            'reply_id' => function(){
                return Reply::all()->random();
            },
        ];
    }
}
