<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint\Converter;


use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterInterface;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

class IntegerTypehintConverter implements ValueTypehintConverterInterface
{

    public const VALUE_TYPE = 'integer';

    /**
     * @param mixed $value
     *
     * @return int
     */
    public function convert(mixed $value): int
    {
        if(is_numeric($value)) {
            return (int)$value;
        }

        if(!is_string($value)) {
            $this->throwException();
        }

        $valueInt = (int)$value;

        if((string)$valueInt !== $value) {
            $this->throwException();
        }

        return $valueInt;
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
