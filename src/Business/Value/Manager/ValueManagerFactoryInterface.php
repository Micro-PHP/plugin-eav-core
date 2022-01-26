<?php

namespace Micro\Plugin\Eav\Business\Value\Manager;

interface ValueManagerFactoryInterface
{
    /**
     * @return ValueManagerInterface
     */
    public function create(): ValueManagerInterface;
}
