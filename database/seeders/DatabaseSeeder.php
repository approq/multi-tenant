<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $basename = basename(config('app.url'));

        $tenant1 = Tenant::create(['id' => 'foo']);
        $tenant1->domains()->create(['domain' => "foo.{$basename}"]);

        $tenant2 = Tenant::create(['id' => 'bar']);
        $tenant2->domains()->create(['domain' => "bar.{$basename}"]);
    }
}
