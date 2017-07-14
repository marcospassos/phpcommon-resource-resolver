<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\Locator\MutableArrayRegistry;
use PhpCommon\ResourceResolver\ResourceRegistry;
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
        $this->cache = new MutableArrayRegistry();
    }

    public function resolve($subject, ResourceRegistry $locator)
    {
        if ($this->cache->has($subject)) {
            return $this->cache->get($subject);
        }

        $resource = $this->strategy->resolve($subject, $locator);

        $this->cache->register($subject, $resource);

        return $resource;
    }
}