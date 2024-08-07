<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create(['tenant_id' => Tenant::factory()->create()]);
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ashraf Almayah',
            'email' => 'ashraf@gmail.com',
            'role' => 'admin',
            'tenant_id' => Tenant::take(1)->first()
        ]);
    }
}
