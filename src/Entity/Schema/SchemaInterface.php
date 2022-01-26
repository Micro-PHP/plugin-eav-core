<?php

namespace Micro\Plugin\Eav\Entity\Schema;

interface SchemaInterface
{
    /**
     * @return string|null
     */
    public function getEntityClass(): ?string;

    /**
     * @param string|null $entityClass
     * @return $this
     */
    public function setEntityClass(?string $entityClass): self;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

}
