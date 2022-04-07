<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MoviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title'=>$this->faker->sentence(4,true),
            'location'=>$this->faker->numberBetween(1,3),
            'details'=>$this->faker->sentence(6,true),
            'avatar'=>$this->faker->image('public/assets/images',800,600,null,true,null,false),
        ];
    }
}
