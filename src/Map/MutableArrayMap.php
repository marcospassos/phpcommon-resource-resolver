<?php

namespace PhpCommon\ResourceResolver\Map;

class MutableArrayMap extends ArrayMap
{
    public function register($id, $resource) : void
    {
        $this->resources[$id] = $resource;
    }
}