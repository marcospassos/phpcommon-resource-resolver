<?php

namespace PhpCommon\ResourceResolver\Locator;

use Croct\Cct\Locator\ResourceNotFoundException;
use PhpCommon\ResourceResolver\ResourceRegistry;
use ArrayObject;

class ArrayRegistry implements ResourceRegistry
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