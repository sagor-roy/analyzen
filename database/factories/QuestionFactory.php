<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function getName($n)
    {
        $characters = 'abcd';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }


    public function definition()
    {
        return [
            'quiz_id' => $this->faker->numberBetween(1,10),
                'title' => $this->faker->realText(35),
                'a' => $this->faker->realText(10),
                'b' => $this->faker->realText(10),
                'c' => $this->faker->realText(10),
                'd' => $this->faker->realText(10),
                'answer' => $this->getName(1),
        ];
    }
}
