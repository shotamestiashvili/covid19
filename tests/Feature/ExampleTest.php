<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function test_login_page()
    {
        $response = $this->get('/');

        $response->assertSuccessful();
    }
}
