<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformationRequest>
 */
class InformationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'request_type' => fake()->randomElement(['permohonan', 'keberatan']),
            'identity_proof' => 'identity/default.jpg',
            'institution' => fake()->company(),
            'proof_institution' => 'institution/default.pdf',
            'data_request' => fake()->paragraph(),
            'phone_number' => fake()->phoneNumber(),
            'complaint' => fake()->optional()->sentence(),
            'status' => fake()->randomElement(['pending', 'diproses', 'disetujui', 'ditolak']),
        ];
    }
}
