<?php

namespace Micro\Plugin\Eav\Business\Value\Get;

use Micro\Plugin\Eav\Entity\Value\ValueInterface;

interface ValueObjectGetInterface
{
    /**
     * @return ValueInterface
     */
    public function get(): ValueInterface;
}
