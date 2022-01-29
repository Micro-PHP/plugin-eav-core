<?php

namespace Micro\Plugin\Eav\Business\Value\Unique;

interface EntityAttributeUniqueGeneratorFactoryInterface
{
    /**
     * @return EntityAttributeUniqueGeneratorInterface
     */
    public function create(): EntityAttributeUniqueGeneratorInterface;
}
