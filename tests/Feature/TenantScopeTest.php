<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantScopeTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_model_has_a_tenant_id_on_the_migration()
    {
        $this->artisan('make:model Test -m');

        $filename = now()->format('Y_m_d_His') . "_create_tests_table.php";

        $this->assertFileExists(database_path("migrations/{$filename}"));

        $this->assertStringContainsString('$table->foreignId(\'tenant_id\')->nullable()->index();', \File::get(database_path("migrations/{$filename}")));

        \File::delete(app_path('Models/Test.php'));
        \File::delete(database_path("migrations/{$filename}"));
    }

    public function test_a_user_can_only_see_users_in_the_same_tenant(){
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create([
            "tenant_id" => $tenant1
        ]);

        //shared tenant to user
        User::factory(9)->create([
            "tenant_id" => $tenant1
        ]);

        //different tenant to user
        User::factory(10)->create([
            "tenant_id" => $tenant2
        ]);

        auth()->login($user1);

        $this->assertEquals(10, User::count());
    }

    public function test_a_user_can_only_create_users_in_his_tenant(){
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create([
            "tenant_id" => $tenant1
        ]);

        auth()->login($user1);

        $user2 = User::factory()->create();

        $this->assertEquals($user1->tenant_id, $user2->tenant_id);
    }

    public function test_a_user_can_only_create_users_in_his_tenant_even_when_other_tenant_is_provided(){
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create([
            "tenant_id" => $tenant1
        ]);

        auth()->login($user1);

        $user2 = User::factory()->create([
            "tenant_id" => $tenant2
        ]);

        $this->assertEquals($user1->tenant_id, $user2->tenant_id);
    }
}
