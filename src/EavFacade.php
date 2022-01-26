<?php

namespace Micro\Plugin\Eav;


use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerFactoryInterface;

class EavFacade implements EavFacadeInterface
{
    public function __construct(
        private SchemaManagerFactoryInterface $schemaManagerProvider,
        protected SchemaBuilderFactoryInterface $schemaBuilderFactory
    )
    {}

    /**
     * {@inheritDoc}
     */
    public function buildSchema(): SchemaBuilderInterface
    {
        return $this->schemaBuilderFactory->create();
    }
}
