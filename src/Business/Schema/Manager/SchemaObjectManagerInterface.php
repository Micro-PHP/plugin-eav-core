<?php

namespace Micro\Plugin\Eav\Business\Schema\Manager;

use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface SchemaObjectManagerInterface
{
    /**
     * @param SchemaInterface $schema
     *
     * @return void
     */
    public function save(SchemaInterface $schema): void;

    /**
     * @param SchemaInterface $schema
     *
     * @return void
     */
    public function remove(SchemaInterface $schema): void;
}
