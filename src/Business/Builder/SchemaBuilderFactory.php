<?php

namespace Micro\Plugin\Eav\Business\Builder;

use Micro\Plugin\Eav\Business\Schema\SchemaManagerInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerProviderInterface;

class SchemaBuilderFactory implements SchemaBuilderFactoryInterface
{
    /**
     * @param SchemaManagerProviderInterface $schemaManagerProvider
     * @param AttributeBuilderFactory $attributeBuilderFactory
     */
    public function __construct(
        private SchemaManagerProviderInterface $schemaManagerProvider,
        private AttributeBuilderFactory $attributeBuilderFactory
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
        return $this->schemaManagerProvider->getManager();
    }
}
