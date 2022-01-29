<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint\Converter;

use Micro\Plugin\Eav\Business\Value\Typehint\ValueTypehintConverterInterface;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

class DateTimeTypehintConverter implements ValueTypehintConverterInterface
{

    public const VALUE_TYPE_DATE = 'date';
    public const VALUE_TYPE_DATETIME = 'datetime';

    /**
     * @param mixed $value
     *
     * @return \DateTimeInterface
     */
    public function convert(mixed $value): \DateTimeInterface
    {
        if($value instanceof \DateTimeInterface) {
            return $value;
        }

        if(!is_string($value)) {
            $this->throwException();
        }
        try {
            return new \DateTime($value);
        } catch (\Throwable) {
            $this->throwException();
        }
    }

    /**
     * @return void
     */
    protected function throwException(): void
    {
        throw new InvalidArgumentException('Invalid DatTime value');
    }

    /**
     * {@inheritDoc}
     */
    public static function supports(string $type): bool
    {
        return in_array(mb_strtolower($type), [
            self::VALUE_TYPE_DATE,
            self::VALUE_TYPE_DATETIME
        ], true);
    }
}
