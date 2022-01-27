<?php

namespace Micro\Plugin\Eav\Business\Builder\Schema;

use Micro\Plugin\Eav\Business\Builder\Attribute\AttributeBuilderInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface SchemaBuilderInterface
{

    /**
     * @param SchemaInterface $schema
     *
     * @return SchemaBuilderInterface
     */
    public function setSchema(SchemaInterface $schema): SchemaBuilderInterface;

    /**
     * @param string $schemaName
     *
     * @return $this
     */
    public function setName(string $schemaName): self;

    /**
     * @param string|null $entityClass
     *
     * @return self
     */
    public function setEntityClass(?string $entityClass): self;

    /**
     * @param string $attributeName
     *
     * @return AttributeBuilderInterface
     */
    public function addAttribute(string $attributeName): AttributeBuilderInterface;

    /**
     * @param bool $force
     *
     * @return self
     */
    public function force(bool $force = true): self;

    /**
     * @return SchemaInterface
     */
    public function build(): SchemaInterface;
}
