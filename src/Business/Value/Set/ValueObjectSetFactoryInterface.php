<?php

namespace Micro\Plugin\Eav\Business\Value\Set;

interface ValueObjectSetFactoryInterface
{
    /**
     * @return ValueObjectSetInterface
     */
    public function create(): ValueObjectSetInterface;
}
