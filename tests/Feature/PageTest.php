<?php

namespace Tests\Feature;

use App\Models\Demografi;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_landing_page_shows_latest_demografi_data(): void
    {
        // Create some sample data
        Demografi::create([
            'bulan' => '05',
            'tahun' => 2026,
            'wni_l' => 100,
            'wni_p' => 150,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        // The view might display the month/year or data, let's verify no error and 200 status
        // and optionally check if the variable 'data' is passed to the view
        $response->assertViewHas('data');
        $response->assertViewHas('displayBulan', '05');
        $response->assertViewHas('displayTahun', 2026);
    }
}
