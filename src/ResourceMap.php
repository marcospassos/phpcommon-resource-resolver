<?php declare(strict_types=1);

namespace PhpCommon\ResourceResolver;

interface ResourceMap {
    public function get(string $id);
    public function has(string $id) : bool;
}