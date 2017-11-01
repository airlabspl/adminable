<?php

namespace Airlabs\Adminable;

trait Adminable
{
    public function isAdmin()
    {
        $column = config('adminable.column', 'is_admin');

        return true === !! $this->$column;
    }
}
