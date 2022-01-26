<?php

namespace Micro\Plugin\Eav;

use Micro\Plugin\Eav\Business\Builder\SchemaBuilderFactoryInterface;
use Micro\Plugin\Eav\Business\Builder\SchemaBuilderInterface;
use Micro\Plugin\Eav\Business\Schema\SchemaManagerProviderInterface;

class EavFacade implements EavFacadeInterface
{
    public function __construct(
        private SchemaManagerProviderInterface $schemaManagerProvider,
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
