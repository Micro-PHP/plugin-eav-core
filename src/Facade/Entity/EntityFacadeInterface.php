<?php

namespace Micro\Plugin\Eav\Facade\Entity;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface EntityFacadeInterface
{
    /**
     * @param EntityInterface $entity
     *
     * @return void
     */
    public function save(EntityInterface $entity): void;

    /**
     * @param EntityInterface $entity
     *
     * @return void
     */
    public function remove(EntityInterface $entity): void;

    /**
     * @param string $schemaName
     * @param int|null $count
     * @param string|null $offsetId
     *
     * @return iterable
     */
    public function list(string $schemaName, int $count = null, string $offsetId = null): iterable;

    /**
     * @param string $schemaName
     *
     * @return int
     */
    public function count(string $schemaName): int;

    /**
     * @param string $schemaName
     * @param string $id
     *
     * @return EntityInterface|null
     */
    public function find(string $schemaName, string $id): ?EntityInterface;
}
