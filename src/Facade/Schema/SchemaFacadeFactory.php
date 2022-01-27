<?php

namespace Micro\Plugin\Eav\Facade\Schema;

use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Schema\Manager\SchemaObjectManagerFactoryInterface;

class SchemaFacadeFactory implements SchemaFacadeFactoryInterface
{
    /**
     * @param SchemaBuilderFactoryInterface $schemaBuilderFactory
     * @param SchemaObjectManagerFactoryInterface $schemaObjectManagerFactory
     */
    public function __construct(
        private SchemaBuilderFactoryInterface $schemaBuilderFactory,
        private SchemaObjectManagerFactoryInterface $schemaObjectManagerFactory
    ) {}

    /**
     * {@inheritDoc}
     */
    public function create(): SchemaFacadeInterface
    {
        return new SchemaFacade(
            $this->schemaBuilderFactory,
            $this->schemaObjectManagerFactory
        );
    }
}
