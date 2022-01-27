<?php

namespace Micro\Plugin\Eav\Entity\Value;

interface ValueInterface
{

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return string
     */
    public function __toString(): string;
}
