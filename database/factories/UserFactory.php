<?php

namespace Database\Factories;

use App\Enums\Pronoun;
use App\Models\User;
use App\Models\XpEntry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => \Hash::make('password'),
            'remember_token' => Str::random(10),
            'pronoun' => $this->faker->randomElement(\Arr::pluck(Pronoun::cases(), 'value')),
            'instagram_handle' => $this->faker->unique()->userName,
            'profile_image' => $this->faker->imageUrl(640, 480),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            XpEntry::factory(rand(1, 5))->create(['user_id' => $user->id]);
        });
    }
}
