<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint\Converter;

use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterInterface;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

class BooleanTypehintConverter implements ValueTypehintConverterInterface
{
    public const VALUE_TYPE = 'bool';

    private const POSSIBLE_VALUES_TRUE = [
        'true', '1', 1
    ];

    private const POSSIBLE_VALUES_FALSE = [
        '0', 0, 'false', ''
    ];

    /**
     * @param mixed $value
     *
     * @return bool
     */
    public function convert(mixed $value): bool
    {
        if(is_bool($value)) {
            return $value;
        }

        if(is_string($value)) {
            $value = mb_strtolower(trim($value));
        }

        if(in_array($value, self::POSSIBLE_VALUES_TRUE, true)) {
            return true;
        }

        if(in_array($value, self::POSSIBLE_VALUES_FALSE, true)) {
            return false;
        }

        throw new InvalidArgumentException('Invalid boolean value');
    }

    /**
     * {@inheritDoc}
     */
    public static function supports(string $type): bool
    {
        return mb_strtolower($type) === self::VALUE_TYPE;
    }
}
