<?php

namespace Micro\Plugin\Eav\Entity\Value;

interface ValueHasDefaultInterface extends ValueInterface
{
    /**
     * @return string
     */
    public function getCastType(): string;
}
