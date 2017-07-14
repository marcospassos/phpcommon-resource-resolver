<?php

namespace PhpCommon\ResourceResolver\Map;

use Croct\Cct\Locator\ResourceNotFoundException;
use PhpCommon\ResourceResolver\ResourceMap;
use ArrayObject;

class ArrayMap implements ResourceMap
{
    protected $resources;

    public function __construct($resources = [])
    {
        $this->resources = new ArrayObject($resources);
    }

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new ResourceNotFoundException();
        }

        return $this->resources[$id];
    }

    public function has($id): bool
    {
        return array_key_exists($id, $this->resources);
    }
}