<?php

namespace Tests\Fakes;

use Airlabs\Adminable\Adminable;

class User
{
    use Adminable;

    public $is_admin = false;

    public $admin_flag = false;
}
