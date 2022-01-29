<?php

namespace Micro\Plugin\Eav\Entity\Attribute;


interface AttributeInterface
{
    /**
     * @return string
     */
    public function getName(): string;
    /**
     * @param string $name
     *
     * @return self
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
     * @param bool $nullable
     *
     * @return self
     */
    public function setNullable(bool $nullable): self;

    /**
     * @return bool
     */
    public function isNullable(): bool;

    /**
     * @param int|null $length
     *
     * @return self
     */
    public function setLength(?int $length = null): self;

    /**
     * @return int|null
     */
    public function getLength(): ?int;

    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string|null $defaultValue
     *
     * @return self
     */
    public function setDefaultValue(?string $defaultValue): self;

    /**
     * @return string|null
     */
    public function getDefaultValue(): ?string;

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

    /**
     * @return string
     */
    public function __toString(): string;
}
