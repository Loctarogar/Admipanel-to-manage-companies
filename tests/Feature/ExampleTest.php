<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHomePageTest()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    public function testAdminDashboard()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(302);
    }
}
