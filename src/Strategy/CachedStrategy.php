<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\Map\MutableArrayMap;
use PhpCommon\ResourceResolver\ResourceMap;
use PhpCommon\ResourceResolver\ResolverStrategy;

class CachedStrategy implements ResolverStrategy
{
    /**
     * @var ResolverStrategy
     */
    protected $strategy;
    protected $cache;

    public function __construct(ResolverStrategy $strategy)
    {
        $this->strategy = $strategy;
        $this->cache = new MutableArrayMap();
    }

    public function resolve($subject, ResourceMap $locator)
    {
        if ($this->cache->has($subject)) {
            return $this->cache->get($subject);
        }

        $resource = $this->strategy->resolve($subject, $locator);

        $this->cache->register($subject, $resource);

        return $resource;
    }
}