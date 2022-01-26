<?php

namespace Micro\Plugin\Eav\Business\Attribute;


use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface AttributeFactoryInterface
{
    /**
     * @param SchemaInterface $schema
     * @param string $name
     * @param string $type
     * @return AttributeInterface
     */
    public function create(SchemaInterface $schema, string $name, string $type): AttributeInterface;
}
