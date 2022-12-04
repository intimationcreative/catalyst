<?php

namespace Intimation\Catalyst;

abstract class Element
{
    public function __construct(
        protected array $config
    ) {
    }

    abstract public function init();
}
