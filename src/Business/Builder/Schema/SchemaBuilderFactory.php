<?php

namespace Micro\Plugin\Eav\Business\Builder\Schema;

use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Factory\SchemaFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Resolver\SchemaResolverFactoryInterface;


class SchemaBuilderFactory implements SchemaBuilderFactoryInterface
{
    /**
     * @param SchemaResolverFactoryInterface $schemaResolverFactory
     * @param SchemaFactoryInterface $schemaFactory
     * @param AttributeBuilderFactoryInterface $attributeBuilderFactory
     */
    public function __construct(
        private SchemaResolverFactoryInterface $schemaResolverFactory,
        private SchemaFactoryInterface $schemaFactory,
        private AttributeBuilderFactoryInterface $attributeBuilderFactory
    )
    {}

    /**
     * {@inheritDoc}
     */
    public function create(): SchemaBuilderInterface
    {
        return new SchemaBuilder(
            $this->schemaResolverFactory,
            $this->schemaFactory,
            $this->attributeBuilderFactory
        );
    }
}
