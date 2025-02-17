<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CovidSurvey>
 */
class CovidSurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_of_birth' => $this->faker->dateTimeBetween('-20 Years', '-15 Years'),
            'division' => $this->faker->randomElement(['Dhaka', 'Chattogram', 'Khulna', 'Rajshahi', 'Barishal', 'Sylhet', 'Rangpur', 'Mymensingh']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'vaccine_doses' => $this->faker->numberBetween(1, 4),
            'problems' => $this->faker->sentence(),
            'symptoms' => $this->faker->randomElements(['Fever', 'Headache', 'Fatigue', 'Nausea', 'Body Pain', 'Cough'], rand(1, 3)), // Generates an array
            '1_dose_name' => $this->faker->randomElement(['Pfizer', 'Moderna', 'AstraZeneca', 'Sinopharm']),
            '2_dose_name' => $this->faker->randomElement(['Pfizer', 'Moderna', 'AstraZeneca', 'Sinopharm']),
            '3_dose_name' => $this->faker->randomElement(['Pfizer', 'Moderna', 'AstraZeneca', 'Sinopharm']),
            '4_dose_name' => $this->faker->randomElement(['Pfizer', 'Moderna', 'AstraZeneca', 'Sinopharm']),
        ];
    }
}
