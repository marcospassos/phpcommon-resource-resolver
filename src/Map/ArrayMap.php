<?php

namespace PhpCommon\ResourceResolver\Map;

use PhpCommon\ResourceResolver\ResourceMap;
use ArrayObject;
use PhpCommon\ResourceResolver\ResourceNotFoundException;

class ArrayMap implements ResourceMap
{
    protected $resources;

    public function __construct($resources = [])
    {
        $this->resources = new ArrayObject($resources);
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new ResourceNotFoundException();
        }

        return $this->resources[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->resources);
    }
}