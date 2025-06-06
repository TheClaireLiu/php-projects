<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */

 //factory allow us to populate our table with dummy data, factory is used to state the default value or data type of a column within database. 声明数据库中列的默认值或数据类型，所有的这些都在definition 方法中完成， 它基本上返回一个数组。
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->word()  //give us a unique word in the entire table
        ];
    }
}
