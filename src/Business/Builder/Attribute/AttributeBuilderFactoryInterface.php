<?php

namespace Micro\Plugin\Eav\Business\Builder\Attribute;

use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;

interface AttributeBuilderFactoryInterface
{
    /**
     * @param SchemaBuilderInterface $schemaBuilder
     * @param string $attributeName
     * @return AttributeBuilderInterface
     */
    public function create(SchemaBuilderInterface $schemaBuilder, string $attributeName): AttributeBuilderInterface;
}
