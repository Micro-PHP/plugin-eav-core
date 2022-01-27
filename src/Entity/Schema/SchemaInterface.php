<?php

namespace Micro\Plugin\Eav\Entity\Schema;

interface SchemaInterface
{


    /**
     * @param string|null $entityClass
     * @return $this
     */
    public function setEntityClass(?string $entityClass): self;

}
