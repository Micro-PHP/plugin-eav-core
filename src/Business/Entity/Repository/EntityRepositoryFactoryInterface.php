<?php

namespace Micro\Plugin\Eav\Business\Entity\Repository;

interface EntityRepositoryFactoryInterface
{
    /**
     * @param string $schemaName
     *
     * @return EntityRepositoryInterface
     */
    public function create(string $schemaName): EntityRepositoryInterface;
}
