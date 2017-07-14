<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\CannotResolveResourceException;
use PhpCommon\ResourceResolver\ResourceRegistry;
use PhpCommon\ResourceResolver\ResolverStrategy;

class NameStrategy implements ResolverStrategy
{
    public function resolve($subject, ResourceRegistry $locator)
    {
        if (!$locator->has($subject)) {
            throw new CannotResolveResourceException('Cannot find resource for '.$subject);
        }

        return $locator->get($subject);
    }
}