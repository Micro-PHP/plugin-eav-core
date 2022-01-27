<?php

namespace Micro\Plugin\Eav\Entity\Value;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Exception\ValueTypeNotExistsException;

class ValueTypeProvider implements ValueTypeProviderInterface
{
    /**
     * @param array<string, string> $valueTypesMapping
     */
    public function __construct(private array $valueTypesMapping)
    {}

    /**
     * @param AttributeInterface $attribute
     *
     * @return string
     */
    public function provideValue(AttributeInterface $attribute): string
    {
        $valueType = $attribute->getType();
        if(!array_key_exists($valueType, $this->valueTypesMapping)) {
            throw new ValueTypeNotExistsException($valueType);
        }

        return $this->valueTypesMapping[$valueType];
    }
}
