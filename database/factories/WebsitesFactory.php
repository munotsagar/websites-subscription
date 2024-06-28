<?php

namespace Database\Factories;

use App\Models\Websites;
use Database\Seeders\WebsitesSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WebsitesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Websites::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
