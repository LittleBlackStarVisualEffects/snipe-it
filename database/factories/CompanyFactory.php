<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company(),
            'created_by' => 1,
            'notes'   => 'Created by DB seeder',
            'tag_color' => $this->faker->hexColor(),
        ];
    }

    public function xssTestCompany()
    {
        return $this->state(function () {
            return [
                'name' => "<script>alert('xssTest company')</script>",
                'tag_color'  => "<script>alert('xssTest company tag')</script>",
                'notes'  => "<script>alert('xssTest company notes')</script>",

            ];
        });
    }
}
