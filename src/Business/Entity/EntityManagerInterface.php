<?php

namespace Micro\Plugin\Eav\Business\Entity;

use ArrayAccess;
use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface EntityManagerInterface
{
    /**
     * @return EntityInterface
     */
    public function create(SchemaInterface $schema): EntityInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return self
     */
    public function save(EntityInterface $entity): self;

    /**
     * @param ArrayAccess $entityCollection
     *
     * @return self
     */
    public function saveBatch(ArrayAccess $entityCollection): self;

    /**
     * @param EntityInterface $entity
     *
     * @return self
     */
    public function delete(EntityInterface $entity): self;

    /**
     * @param ArrayAccess<EntityInterface> $entityCollection
     *
     * @return self
     */
    public function deleteBatch(ArrayAccess $entityCollection): self;
}
