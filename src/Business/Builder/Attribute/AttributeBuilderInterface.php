<?php

namespace Micro\Plugin\Eav\Business\Builder\Attribute;

use Micro\Plugin\Eav\Business\Builder\Schema\SchemaBuilderInterface;
use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface AttributeBuilderInterface
{

    /**
     * @param SchemaInterface $schema
     *
     * @return AttributeInterface
     */
    public function create(SchemaInterface $schema): AttributeInterface;

    /**
     * @param string $type
     *
     * @return AttributeBuilderInterface
     */
    public function setType(string $type): AttributeBuilderInterface;

    /**
     * @param bool $isNullable
     *
     * @return AttributeBuilderInterface
     */
    public function setIsNullable(bool $isNullable): AttributeBuilderInterface;

    /**
     * @param int $length
     *
     * @return AttributeBuilderInterface
     */
    public function setLength(int $length): AttributeBuilderInterface;

    /**
     * @param string $description
     *
     * @return AttributeBuilderInterface
     */
    public function setDescription(string $description): AttributeBuilderInterface;

    /**
     * @param mixed $defaultValue
     *
     * @return AttributeBuilderInterface
     */
    public function setDefaultValue(mixed $defaultValue): AttributeBuilderInterface;

    /**
     * @param bool $isUnique
     *
     * @return AttributeBuilderInterface
     */
    public function setIsUnique(bool $isUnique): AttributeBuilderInterface;

    /**
     * @return SchemaBuilderInterface
     */
    public function complete(): SchemaBuilderInterface;
}
