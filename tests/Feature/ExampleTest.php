<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

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
        $response->assertSee("Biete Tutor:"); // second result
    }

    public function testInserateFilter()
    {
        $response = $this->get('/inserate/filter/suche');

        $response->assertStatus(200);
        $response->assertSee("Aktueller Filter:");

        $response2 = $this->get('/inserate/filter/suche/student');

        $response2->assertStatus(200);
        $response2->assertSee("Suche Tutor:"); // first result

        $response3 = $this->get('/inserate/filter/suche/student/1');

        $response3->assertStatus(200);
        $response3->assertSee("Suche Tutor:"); // first result
    }

    public function testInserateView()
    {
        $response = $this->get('/inserate/1');

        $response->assertStatus(200);
        $response->assertSee("von: test"); // creator
    }

    public function testAltklausuren()
    {
        $response = $this->get('/altklausuren');

        $response->assertStatus(200);
        $response->assertSee("(PNG)"); // from a result
    }

    public function testAltklausurenFilter()
    {
        $response = $this->get('/altklausuren/1');

        $response->assertStatus(200);
        $response->assertSee("(JPG)"); // from a result
    }

    public function testCreateInserat()
    {
        $user = User::find(1); // user test

        $response = $this->actingAs($user)->get('/inserate/create');

        $response->assertStatus(200);
        $response->assertSee("Titel"); // a label for a form field
    }

    public function testOwnInserat()
    {
        $user = User::find(1); // user test

        $response = $this->actingAs($user)->get('/inserate/own');

        $response->assertStatus(200);
        $response->assertSee("Suche Tutor"); // first result
    }

    public function testEditInserat()
    {
        $user = User::find(1); // user test

        $response = $this->actingAs($user)->get('/inserate/1/edit');

        $response->assertStatus(200);
        $response->assertSee("Titel"); // a label for a form field
    }

    public function testEditInseratFail()
    {
        $user = User::find(1); // user test

        $response = $this->actingAs($user)->get('/inserate/2/edit'); // try to edit a post belonging to another user

        $response->assertStatus(403);
        $response->assertSee("Fehler 403"); // error
    }

    public function testCreateAltklausur()
    {
        $user = User::find(1); // user test

        $response = $this->actingAs($user)->get('/altklausuren/create');

        $response->assertStatus(200);
        $response->assertSee("Titel"); // a label for a form field
    }

    public function testOwnAltklausur()
    {
        $user = User::find(1); // user test

        $response = $this->actingAs($user)->get('/altklausuren/own');

        $response->assertStatus(200);
        $response->assertSee("(JPG)"); // first result
    }

    public function testPageNotFound()
    {
        $response = $this->get('/inserate/100');

        $response->assertStatus(404);
        $response->assertSee("Fehler 404"); // error msg
    }
}
