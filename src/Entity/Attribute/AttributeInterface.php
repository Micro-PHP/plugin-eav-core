<?php

namespace Micro\Plugin\Eav\Entity\Attribute;

use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface AttributeInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName( string $name ): self;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * Available default types: string, integer, float, text, boolean
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self;

    /**
     * @return bool
     */
    public function isNullable(): bool;

    /**
     * @param bool $nullable
     *
     * @return self
     */
    public function setNullable(bool $nullable): self;

    /**
     * @return int|null
     */
    public function getLength(): ?int;

    /**
     * @param int|null $length
     *
     * @return self
     */
    public function setLength(?int $length = null): self;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self;

    /**
     * @return string|null
     */
    public function getDefaultValue(): ?string;

    /**
     * @param string|null $defaultValue
     *
     * @return self
     */
    public function setDefaultValue(?string $defaultValue): self;

    /**
     * @return bool
     */
    public function isUnique(): bool;

    /**
     * @param bool $isUnique
     *
     * @return self
     */
    public function setIsUnique(bool $isUnique): self;
}
