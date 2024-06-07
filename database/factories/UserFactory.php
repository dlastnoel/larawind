<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['active', 'deactivated', 'terminated'][rand(0,2)];
        return [
            'firstname' => fake()->firstName(),
            'middlename' => rand(0,1) ? fake()->lastName() : '',
            'lastname' => fake()->lastName(),
            'suffix' => rand(0,1) ? fake()->suffix() : '',
            'email' => fake()->email(),
            'status' => $status,
            'terminated_at' => $status === 'terminated' ? fake()->dateTimeBetween('-5 years') : '',
            'password' => static::$password ??= Hash::make('password'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
