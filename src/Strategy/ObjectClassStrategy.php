<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\CannotResolveResourceException;
use PhpCommon\ResourceResolver\ResourceMap;
use PhpCommon\ResourceResolver\ResolverStrategy;

class ObjectClassStrategy implements ResolverStrategy
{
    protected $strategy;

    public function __construct(ResolverStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function resolve($subject, ResourceMap $locator)
    {
        if (!is_object($subject)) {
            throw new CannotResolveResourceException();
        }

        return $this->strategy->resolve(get_class($subject), $locator);
    }
}