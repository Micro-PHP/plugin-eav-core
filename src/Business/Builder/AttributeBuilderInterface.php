<?php

namespace Micro\Plugin\Eav\Business\Builder;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;
use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface AttributeBuilderInterface
{
    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;

    /**
     * @param bool $isNullable
     * @return $this
     */
    public function setIsNullable(bool $isNullable): self;

    /**
     * @param int $length
     * @return $this
     */
    public function setLength(int $length): self;

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self;

    /**
     * @param mixed $defaultValue
     * @return $this
     */
    public function setDefaultValue(mixed $defaultValue): self;

    /**
     * @param bool $isUnique
     * @return $this
     */
    public function setIsUnique(bool $isUnique): self;

    /**
     * @return SchemaBuilderInterface
     */
    public function complete(): SchemaBuilderInterface;

    /**
     * @return AttributeInterface
     */
    public function create(SchemaInterface $schema): AttributeInterface;
}
