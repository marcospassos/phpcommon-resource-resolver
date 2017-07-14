<?php declare(strict_types=1);

namespace PhpCommon\ResourceResolver;

interface ResourceResolver {
    public function resolve($subject);
}