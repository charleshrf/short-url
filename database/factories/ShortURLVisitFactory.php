<?php

namespace Database\Factories;

use AshAllenDesign\ShortURL\Models\ShortURL;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Jenssegers\Agent\Agent;

class ShortURLVisitFactory extends Factory
{
    protected $model = ShortURLVisit::class;

    public function definition(): array
    {
        return [
            'ip_address' => $this->faker->ipv4(),
            'operating_system' => $this->faker->randomElement(Agent::getPlatforms()),
            'operating_system_version' => $this->faker->randomFloat(8, 20),
            'browser' => $this->faker->randomElement(Agent::getBrowsers()),
            'browser_version' => $this->faker->userAgent(),
            'device_type' => $this->faker->randomElement(
                array_merge(
                    Agent::getPhoneDevices(),
                    Agent::getTabletDevices(),
                    Agent::getDesktopDevices(),
                )),
            'visited_at' => Carbon::now(),
            'referer_url' => $this->faker->url(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'short_url_id' => ShortURL::factory(),
        ];
    }
}
