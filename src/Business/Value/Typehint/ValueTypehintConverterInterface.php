<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint;

use Micro\Plugin\Eav\Exception\InvalidArgumentException;

interface ValueTypehintConverterInterface
{
    /**
     * @param mixed $value
     *
     * @throws InvalidArgumentException
     *
     * @return mixed
     */
    public function convert(mixed $value);

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function supports(string $type): bool;
}
