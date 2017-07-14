<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\ResourceRegistry;

class CachedClassHierarchyStrategy extends ClassHierarchyStrategy
{
    protected $cache;

    public function __construct(string $root = null)
    {
        parent::__construct($root);

        $this->cache = [];
    }

    protected function resolveId(string $class, ResourceRegistry $locator) : string
    {
        if (isset($this->cache[$class])) {
            $cached = $this->cache[$class];

            if ($locator->has($cached)) {
                return $cached;
            }

            unset($this->cache[$class]);
        }

        return $this->cache[$class] = parent::resolveId($class, $locator);
    }
}