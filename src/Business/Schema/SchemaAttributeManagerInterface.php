<?php

namespace Micro\Plugin\Eav\Business\Schema;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;
use Micro\Plugin\Eav\Exception\AttributeNotFoundException;
use Micro\Plugin\Eav\Exception\SchemaNotFoundException;

interface SchemaAttributeManagerInterface
{
    /**
     * @param SchemaInterface $schema
     * @param AttributeInterface $attribute
     *
     * @throws SchemaNotFoundException
     *
     * @return self
     */
    public function addAttribute(SchemaInterface $schema, AttributeInterface $attribute): self;

    /**
     * @param SchemaInterface $schema
     * @param string $attributeName
     *
     * @throws SchemaNotFoundException
     * @throws AttributeNotFoundException
     *
     * @return AttributeInterface
     */
    public function getAttribute(SchemaInterface $schema, string $attributeName): AttributeInterface;
}
