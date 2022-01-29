<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint;


use RuntimeException;

interface ValueTypehintConverterFactoryInterface
{
    /**
     * @param string $attributeType
     *
     * @throws RuntimeException
     *
     * @return ValueTypehintConverterInterface
     */
    public function create(string $attributeType): ValueTypehintConverterInterface;
}
