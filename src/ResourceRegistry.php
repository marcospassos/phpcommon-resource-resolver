<?php declare(strict_types=1);

namespace PhpCommon\ResourceResolver;

interface ResourceRegistry {
    public function get($identifier);
    public function has($identifier) : bool;
}