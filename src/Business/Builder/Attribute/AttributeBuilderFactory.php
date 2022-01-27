<?php

namespace Micro\Plugin\Eav\Business\Builder\Attribute;

use Micro\Plugin\Eav\Business\Attribute\AttributeFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaAttributeManagerFactoryInterface;

class AttributeBuilderFactory implements AttributeBuilderFactoryInterface
{
    /**
     * @param SchemaAttributeManagerFactoryInterface $schemaManagerFactory
     * @param AttributeFactoryInterface $attributeFactory
     */
    public function __construct(
        private SchemaAttributeManagerFactoryInterface $schemaManagerFactory,
        private AttributeFactoryInterface              $attributeFactory
    ){}

    /**
     * @param SchemaBuilderInterface $schemaBuilder
     * @param string $attributeName
     *
     * @return AttributeBuilder
     */
    public function create(SchemaBuilderInterface $schemaBuilder, string $attributeName): AttributeBuilderInterface
    {
        return new AttributeBuilder(
            $this->schemaManagerFactory->create(),
            $schemaBuilder,
            $this->attributeFactory,
            $attributeName
        );
    }
}
