<?php

namespace App\Traits;

trait RouteKey
{
    public function getRouteKey()
    {
        return $this->slug;
    }
}
