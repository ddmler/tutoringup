<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee("Inserate");
    }

    public function testInserate()
    {
        $response = $this->get('/inserate');

        $response->assertStatus(200);
        $response->assertSee("Inserat Übersicht");
    }

    public function testInserateFilter()
    {
        $response = $this->get('/inserate/filter/suche');

        $response->assertStatus(200);
        $response->assertSee("Aktueller Filter:");
    }

    public function testAltklausuren()
    {
        $response = $this->get('/altklausuren');

        $response->assertStatus(200);
        $response->assertSee("Altklausuren Übersicht");
    }

    public function testAltklausurenFilter()
    {
        $response = $this->get('/altklausuren/1');

        $response->assertStatus(200);
        $response->assertSee("Aktueller Filter:");
    }
}
