<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{

    // database changes from this test won't commit
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    /** @test */
    public function a_guest_may_not_create_a_team() 
    {
        // $this->withoutExceptionHandling();
        $this->post('/teams')->assertRedirect('/login');

    }

     /** @test */
    public function a_user_can_create_a_team()
    {
        // $this->withoutExceptionHandling();

        // Given I am a user who is logged in
        $this->actingAs(factory('App\User')->create());
        $attributes = ['name' => 'Acme'];  

        // When they hit the endpoint /teams to create a new team while passing necessary data
        $this->post('/teams', $attributes);

        // Then there should be a new team in the database
        $this->assertDatabaseHas('teams', $attributes);
    }


}
