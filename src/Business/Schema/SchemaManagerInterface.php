<?php

namespace Micro\Plugin\Eav\Business\Schema;

use ArrayAccess;
use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;
use Micro\Plugin\Eav\Exception\AttributeNotFoundException;
use Micro\Plugin\Eav\Exception\SchemaNotFoundException;

interface SchemaManagerInterface extends SchemaFactoryInterface
{
    /**
     * @param string $schemaName
     *
     * @return bool
     */
    public function exists(string $schemaName): bool;

    /**
     * @param string $schemaName
     *
     * @throws SchemaNotFoundException
     *
     * @return SchemaInterface
     */
    public function findByName(string $schemaName): SchemaInterface;

    /**
     * @param string $className
     *
     * @throws SchemaNotFoundException
     *
     * @return SchemaInterface
     */
    public function findByEntityClass(string $className): SchemaInterface;

    /**
     * @param SchemaInterface $schema
     * @param AttributeInterface $attribute
     *
     * @throws SchemaNotFoundException
     *
     * @return self
     */
    public function addAttribute(SchemaInterface $schema, AttributeInterface $attribute): self;

    /**
     * @param SchemaInterface $schema
     * @param ArrayAccess<AttributeInterface> $attributes
     *
     * @throws SchemaNotFoundException
     *
     * @return self
     */
    public function setAttributes(SchemaInterface $schema, ArrayAccess $attributes): self;

    /**
     * @param SchemaInterface $schema
     * @return self
     */
    public function save(SchemaInterface $schema): self;

    /**
     * @param SchemaInterface $schema
     *
     * @throws SchemaNotFoundException
     *
     * @return ArrayAccess<AttributeInterface>
     */
    public function getAttributes(SchemaInterface $schema): ArrayAccess;

    /**
     * @param SchemaInterface $schema
     * @param string $attributeName
     *
     * @throws SchemaNotFoundException
     * @throws AttributeNotFoundException
     *
     * @return AttributeInterface
     */
    public function getAttribute(SchemaInterface $schema, string $attributeName): AttributeInterface;
}
