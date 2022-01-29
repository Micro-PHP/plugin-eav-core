<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint\Converter;

use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterInterface;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

class FloatTypehintConverter implements ValueTypehintConverterInterface
{

    public const VALUE_TYPE = 'float';

    /**
     * @param mixed $value
     *
     * @return float
     */
    public function convert(mixed $value): float
    {
        if(is_numeric($value)) {
            return (float)$value;
        }

        if(!is_string($value)) {
            $this->throwException();
        }

        return (float)$value;
    }

    /**
     * @return void
     */
    protected function throwException(): void
    {
        throw new InvalidArgumentException('Invalid Integer value');
    }

    /**
     * {@inheritDoc}
     */
    public static function supports(string $type): bool
    {
        return mb_strtolower($type) === self::VALUE_TYPE;
    }
}
