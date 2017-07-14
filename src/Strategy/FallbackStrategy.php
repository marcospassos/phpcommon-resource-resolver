<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\CannotResolveResourceException;
use PhpCommon\ResourceResolver\ResourceMap;
use PhpCommon\ResourceResolver\ResolverStrategy;

class FallbackStrategy implements ResolverStrategy
{
    /**
     * @var ResolverStrategy[]
     */
    protected $strategy;

    private $fallback;

    public function __construct(ResolverStrategy $strategy, $fallback)
    {
        $this->strategy = $strategy;
        $this->fallback = $fallback;
    }

    public function resolve($subject, ResourceMap $locator)
    {
        try {
            return $this->strategy->resolve($subject, $locator);
        } catch (CannotResolveResourceException $exception) {
            // continue;
        }

        return $locator->get($this->fallback);
    }
}