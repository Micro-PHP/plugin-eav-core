<?php

namespace Micro\Plugin\Eav\Business\Builder;

use Micro\Plugin\Eav\Business\Attribute\AttributeFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerProviderInterface;

class AttributeBuilderFactory implements AttributeBuilderFactoryInterface
{
    /**
     * @param SchemaManagerProviderInterface $schemaManagerProvider
     * @param AttributeFactoryInterface $attributeFactory
     */
    public function __construct(
        private SchemaManagerProviderInterface $schemaManagerProvider,
        private AttributeFactoryInterface $attributeFactory
    ){}

    /**
     * @param SchemaBuilderInterface $schemaBuilder
     * @param string $attributeName
     * @return AttributeBuilderInterface
     */
    public function create(SchemaBuilderInterface $schemaBuilder, string $attributeName): AttributeBuilderInterface
    {
        return new AttributeBuilder(
            $this->schemaManagerProvider->getManager(),
            $schemaBuilder,
            $this->attributeFactory,
            $attributeName
        );
    }
}
