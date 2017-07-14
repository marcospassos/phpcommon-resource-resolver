<?php

namespace PhpCommon\ResourceResolver\Strategy;

use PhpCommon\ResourceResolver\CannotResolveResourceException;
use PhpCommon\ResourceResolver\ResourceRegistry;
use PhpCommon\ResourceResolver\ResolverStrategy;

class DelegateStrategy implements ResolverStrategy
{
    /**
     * @var ResolverStrategy[]
     */
    protected $strategies;

    public function __construct(ResolverStrategy ...$resolvers)
    {
        $this->strategies = $resolvers;
    }

    public function resolve($subject, ResourceRegistry $locator)
    {
        foreach ($this->strategies as $resolver) {
            try {
                return $resolver->resolve($subject, $locator);
            } catch (CannotResolveResourceException $exception) {
                // continue;
            }
        }

        throw new CannotResolveResourceException();
    }
}