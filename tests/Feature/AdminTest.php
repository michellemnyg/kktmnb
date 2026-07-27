<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Demografi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_dashboard_can_be_rendered_for_authenticated_users(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Analisis Kependudukan Terpadu');
    }

    public function test_management_page_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.management'));

        $response->assertStatus(200);
    }

    public function test_admin_can_save_demografi_data(): void
    {
        $user = User::factory()->create();

        $data = [
            'bulan' => '01',
            'tahun' => 2026,
            'wni_l' => 10,
            'wni_p' => 15,
            'umur_key' => ['0-4', '5-9'],
            'umur_l' => [5, 5],
            'umur_p' => [7, 8],
        ];

        $response = $this->actingAs($user)->post(url('/admin/management'), $data);

        $response->assertSessionHas('success');
        
        $this->assertDatabaseHas('demografis', [
            'bulan' => '01',
            'tahun' => 2026,
            'wni_l' => 10,
            'wni_p' => 15,
        ]);

        $demografi = Demografi::where('bulan', '01')->where('tahun', 2026)->first();

        $this->assertDatabaseHas('demografi_umurs', [
            'demografi_id' => $demografi->id,
            'umur' => '0-4',
            'laki' => 5,
            'perempuan' => 7,
        ]);
    }

    public function test_save_data_validation_errors(): void
    {
        $user = User::factory()->create();

        // Missing required 'bulan' and 'tahun'
        $response = $this->actingAs($user)->post(url('/admin/management'), [
            'wni_l' => 10,
        ]);

        $response->assertSessionHasErrors(['bulan', 'tahun']);
    }

    public function test_mass_assignment_protection(): void
    {
        $user = User::factory()->create();

        $data = [
            'bulan' => '02',
            'tahun' => 2026,
            'wni_l' => 5,
            // A malicious field that does not exist in the database or allowed fields
            'is_admin' => 1, 
            'malicious_column' => 'hack',
        ];

        // Should not throw SQL exception because the unallowed fields are stripped out
        $response = $this->actingAs($user)->post(url('/admin/management'), $data);

        $response->assertSessionHas('success');

        $this->assertDatabaseHas('demografis', [
            'bulan' => '02',
            'tahun' => 2026,
            'wni_l' => 5,
        ]);
    }
}
