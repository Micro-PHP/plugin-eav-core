<?php

namespace Micro\Plugin\Eav\Entity\Attribute;

use Micro\Plugin\Eav\Entity\Schema\SchemaInterface;

interface AttributeInterface
{


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
     * @param int|null $length
     *
     * @return self
     */
    public function setLength(?int $length = null): self;

    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self;

    /**
     * @param string|null $defaultValue
     *
     * @return self
     */
    public function setDefaultValue(?string $defaultValue): self;

    /**
     * @param bool $isUnique
     *
     * @return self
     */
    public function setIsUnique(bool $isUnique): self;
}
