<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyProfile>
 */
class CompanyProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Koyasai',
            'address' => 'Jl. Parangtritis Raya No.3 Ancol Barat, Pademangan Jakarta Utara Jakarta 14430',
            'history' => fake()->text(200),
            'simple_history' => fake()->text(100),
            'email' => 'info@indofresh.co.id',
            'instagram' => 'https://www.instagram.com/indofresh.fruit/',
            'facebook' => 'https://www.facebook.com/PTIndofresh/',
            'youtube' => 'https://youtu.be/ageOlag_ZBk',
            'whatsapp' => 'https://wa.me/6281298985155',
            'phone' => '021 6479 8888',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7934.070583840624!2d106.81721493768498!3d-6.1259532078282595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e06dd56f04d%3A0x88079a2932f12d1e!2sPT%20Indofresh!5e0!3m2!1sid!2sid!4v1740110836922!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'logo' => 'logo.webp'
        ];
    }
}
