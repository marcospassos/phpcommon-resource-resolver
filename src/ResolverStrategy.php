<?php

namespace PhpCommon\ResourceResolver;

interface ResolverStrategy
{
    public function resolve($subject, ResourceMap $locator);
}