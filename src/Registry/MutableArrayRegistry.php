<?php

namespace PhpCommon\ResourceResolver\Registry;

class MutableArrayRegistry extends ArrayRegistry
{
    public function register($id, $resource) : void
    {
        $this->resources[$id] = $resource;
    }
}