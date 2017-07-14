<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\CannotResolveResourceException;
use PhpCommon\ResourceResolver\ResourceMap;
use PhpCommon\ResourceResolver\ResolverStrategy;

class ClassHierarchyStrategy implements ResolverStrategy
{
    protected $root;

    public function __construct(string $root = null)
    {
        $this->root = $root;
    }

    public function resolve($subject, ResourceMap $locator)
    {
        if (!class_exists($subject)) {
            throw new CannotResolveResourceException();
        }

        return $locator->get($this->resolveId($subject, $locator));
    }

    protected function resolveId(string $class, ResourceMap $locator) : string
    {
        if ($locator->has($class)) {
            return $class;
        }

        $parent = get_parent_class($class);

        if ($parent !== false) {
            return $this->resolveId($parent, $locator);
        }

        if ($this->root === null || !$locator->has($this->root)) {
            throw new CannotResolveResourceException();
        }

        return $this->root;
    }
}