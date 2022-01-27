<?php

namespace Micro\Plugin\Eav\Business\Attribute\Resolver;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface SchemaAttributeResolverInterface
{
    /**
     * @param SchemaInterface $schema
     * @param string $attributeName
     *
     * @return AttributeInterface
     */
    public function resolveAttribute(SchemaInterface $schema, string $attributeName): AttributeInterface;

    /**
     * @param SchemaInterface $schema
     *
     * @return iterable<AttributeInterface>
     */
    public function resolveAttributes(SchemaInterface $schema): iterable;
}
