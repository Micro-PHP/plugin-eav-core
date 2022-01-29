<?php

namespace Micro\Plugin\Eav\Business\Value\Unique;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Value\ValueInterface;

interface EntityAttributeUniqueGeneratorInterface
{
    /**
     * @param EntityInterface $entity
     * @param AttributeInterface $attribute
     * @param ValueInterface $value
     * @return void
     */
    public function generate(EntityInterface $entity, AttributeInterface $attribute, ValueInterface $value): void;
}
