<?php

namespace Tests;

use Tests\Fakes\User;

class IsAdminTest extends TestCase
{
    /** @test */
    function default_user_is_not_an_admin()
    {
        $user = new User();

        $this->assertFalse($user->isAdmin());
    }

    /** @test */
    function users_can_be_admin()
    {
        $user = new User();
        $user->is_admin = true;

        $this->assertTrue($user->isAdmin());
    }
}
