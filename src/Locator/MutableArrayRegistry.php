<?php

namespace PhpCommon\ResourceResolver\Locator;

class MutableArrayRegistry extends ArrayRegistry
{
    public function register($id, $resource) : void
    {
        $this->resources[$id] = $resource;
    }
}