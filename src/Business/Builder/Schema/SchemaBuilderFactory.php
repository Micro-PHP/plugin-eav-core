<?php

namespace Micro\Plugin\Eav\Business\Builder\Schema;

use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerInterface;

class SchemaBuilderFactory implements SchemaBuilderFactoryInterface
{
    /**
     * @param SchemaManagerFactoryInterface $schemaManagerFactory
     * @param AttributeBuilderFactoryInterface $attributeBuilderFactory
     */
    public function __construct(
        private SchemaManagerFactoryInterface $schemaManagerFactory,
        private AttributeBuilderFactoryInterface $attributeBuilderFactory
    )
    {}

    /**
     * {@inheritDoc}
     */
    public function create(): SchemaBuilderInterface
    {
        return new SchemaBuilder(
            $this->getSchemaManager(),
            $this->attributeBuilderFactory
        );
    }

    /**
     * @return SchemaManagerInterface
     */
    protected function getSchemaManager(): SchemaManagerInterface
    {
        return $this->schemaManagerFactory->create();
    }
}
