<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{

    use RefreshDatabase;

    /** @test    */
    public function a_user_can_have_a_team()
    {
        // given Iuser
        $user = factory('App\User')->create();

        // user creates a team called Acme
        $user->team()->create(['name' => 'Acme']);

        // the user should have a team called Acme
        $this->assertEquals('Acme', $user->team->name);

    }
}
