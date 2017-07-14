<?php declare(strict_types=1);

namespace PhpCommon\ResourceResolver;

interface ResourceMap {
    public function get($id);
    public function has($id) : bool;
}