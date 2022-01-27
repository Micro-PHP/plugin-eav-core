<?php

namespace Micro\Plugin\Eav\Business\Entity\Repository;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

interface EntityRepositoryInterface
{
    /**
     * @param string $id
     * @return EntityInterface|null
     */
    public function find(string $id): ?EntityInterface;

    /**
     * @param int|null $count
     * @param string|null $offsetId
     * @return iterable
     */
    public function list(int $count = null, string $offsetId = null): iterable;

    /**
     * @return int
     */
    public function count(): int;
}
