<?php

namespace Micro\Plugin\Eav\Business\Schema;

class SchemaManagerProvider implements SchemaManagerProviderInterface
{
    /**
     * @var SchemaManagerInterface|null
     */
    private ?SchemaManagerInterface $manager;

    /**
     * @param SchemaManagerFactoryInterface $schemaManagerFactory
     */
    public function __construct(private SchemaManagerFactoryInterface $schemaManagerFactory)
    {
        $this->manager = null;
    }

    /**
     * {@inheritDoc}
     */
    public function getManager(): SchemaManagerInterface
    {
        if($this->manager === null) {
            $this->manager = $this->schemaManagerFactory->create();
        }

        return $this->manager;
    }
}
