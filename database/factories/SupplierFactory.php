<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

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
            'contact' => $this->faker->name(),
            'country' => $this->faker->countryCode(),
            'created_by' => User::factory()->superuser(),
            'email' => $this->faker->safeEmail(),
            'fax'   => $this->faker->phoneNumber(),
            'name' => $this->faker->company(),
            'notes' => $this->faker->text(191), // Supplier notes can be a max of 255 characters.
            'phone' => $this->faker->phoneNumber(),
            'state' => $this->faker->stateAbbr(),
            'tag_color' => $this->faker->hexColor(),
            'url'   => $this->faker->url(),
            'zip' => $this->faker->postCode(),
        ];
    }

    public function xssTestSupplier()
    {
        return $this->state(function () {
            return [
                'name' => "<script>alert('xssTest supplier')</script>",
                'url'  => "https://xssTest.<script>alert('xssTest supplier url')</script>.com",
                'phone'  => "<script>alert('xssTest supplier phone')</script>",
                'fax'  => "<script>alert('xssTest supplier fax')</script>",
                'contact'  => "<script>alert('xssTest supplier contact')</script>",
                'tag_color'  => "<script>alert('xssTest supplier tag')</script>",
                'notes'  => "<script>alert('xssTest supplier notes')</script>",
                'address'  => "<script>alert('xssTest supplier address')</script>",
                'address2'  => "<script>alert('xssTest supplier address2')</script>",
                'city'  => "<script>alert('xssTest supplier city')</script>",
                'state'  => "<script>alert('xssTest supplier state')</script>",
                'country'  => "<script>alert('xssTest supplier country')</script>",
                'zip'  => "<script>alert('xssTest supplier zip')</script>",
            ];
        });
    }
}
