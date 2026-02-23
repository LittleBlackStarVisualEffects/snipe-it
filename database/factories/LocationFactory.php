<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->streetAddress(),
            'address2' => $this->faker->secondaryAddress(),
            'city' => $this->faker->city(),
            'country' => $this->faker->countryCode(),
            'created_by' => User::factory()->superuser(),
            'currency' => $this->faker->currencyCode(),
            'image' => rand(1, 9).'.jpg',
            'name' => $this->faker->city(),
            'notes'   => 'Created by DB seeder',
            'state' => $this->faker->stateAbbr(),
            'tag_color' => $this->faker->hexColor(),
            'zip' => $this->faker->postcode(),
        ];
    }
  
    // one of these can eventuall go away - left temporarily for conflict resolution
    public function deleted(): self
    {
        return $this->state(['deleted_at' => $this->faker->dateTime()]);
    }
  
    public function deletedLocation()
    {
        return $this->state(function () {
            return [
                'deleted_at' => $this->faker->dateTime(),
            ];
        });
    }

    public function xssTestLocation()
    {
        return $this->state(function () {
            return [
                'address'  => "<script>alert('xssTest location address')</script>",
                'address2'  => "<script>alert('xssTest location address2')</script>",
                'city'  => "<script>alert('xssTest location city')</script>",
                'country'  => "<script>alert('xssTest location country')</script>",
                'name' => "<script>alert('xssTest location')</script>",
                'notes'  => "<script>alert('xssTest location notes')</script>",
                'phone'  => "<script>alert('xssTest location phone')</script>",
                'state'  => "<script>alert('xssTest location state')</script>",
                'tag_color'  => "<script>alert('xssTest location tag')</script>",
                'zip'  => "<script>alert('xssTest location zip')</script>",
//                'created_by' => function () {
//                    return User::where('username', "<script>alert('xssTest username')</script>@example.org")->first() ?? User::factory()->xssTestUser()->create();
//                },
            ];
        });
    }
}
