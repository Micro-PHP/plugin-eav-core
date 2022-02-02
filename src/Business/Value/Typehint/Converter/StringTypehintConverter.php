<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint\Converter;

use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterInterface;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

class StringTypehintConverter implements ValueTypehintConverterInterface
{
    public const VALUE_TYPE_STRING = 'string';
    public const VALUE_TYPE_TEXT   = 'text';

    /**
     * @param mixed $value
     * @return mixed|void
     */
    public function convert(mixed $value): string
    {
        if(is_string($value)) {
            return $value;
        }

        if(is_object($value) && !method_exists($value, '__toString')) {
            $this->throwException();
        }

        if(!is_object($value) && settype( $item, 'string' ) === false) {
            $this->throwException();
        }

        return (string)$value;
    }

    /**
     * @return void
     */
    protected function throwException(): void
    {
        throw new InvalidArgumentException('Invalid String value');
    }

    /**
     * {@inheritDoc}
     */
    public static function supports(string $type): bool
    {
        return in_array(mb_strtolower($type), [
           self::VALUE_TYPE_STRING,
           self::VALUE_TYPE_TEXT
        ], true);
    }
}
