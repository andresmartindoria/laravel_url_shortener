<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_create_url(): void
    {
        $this->get('/urls')->assertStatus(200);

        // Simulate a user creating a new post through the web interface
        $response = $this->post('url.store', [
            'title' => 'Primera URL',
            'original_url' => 'https://spot2.mx/buscar'
        ]);
    }
}
