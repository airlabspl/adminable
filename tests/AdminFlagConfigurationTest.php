<?php

namespace Tests;

use Tests\Fakes\User;

class AdminFlagConfigurationTest extends TestCase
{
    /** @test */
    function flag_defaults_to_is_admin()
    {
        $user = new User();

        $this->assertFalse($user->isAdmin());

        $user->is_admin = true;

        $this->assertTrue($user->isAdmin());
    }

    /** @test */
    function flag_can_be_configured()
    {
        config()->set('adminable.column', 'admin_flag');

        $user = new User();

        $this->assertFalse($user->isAdmin());

        $user->admin_flag = true;

        $this->assertTrue($user->isAdmin());
    }
}
