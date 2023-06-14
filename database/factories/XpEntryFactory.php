<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\User;
use App\Models\XpEntry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class XpEntryFactory extends Factory
{
    protected $model = XpEntry::class;

    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::inRandomOrder()->first(),
            'user_id' => User::factory(),

            'xp' => rand(1, 100),
        ];
    }
}
