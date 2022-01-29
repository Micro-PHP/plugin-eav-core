<?php

namespace Micro\Plugin\Eav\Business\Entity\Builder;

use Micro\Plugin\Eav\Entity\Entity\EntityInterface;
use Micro\Plugin\Eav\Exception\InvalidArgumentException;

interface EntityBuilderInterface
{
    /**
     * @param string $schemaName
     * @return $this
     */
    public function setSchema(string $schemaName): self;

    /**
     * @param string $attributeName
     * @param mixed $value
     *
     * @return self
     */
    public function setValue(string $attributeName, mixed $value): self;

    /**
     * @return EntityInterface
     *
     * @throws \RuntimeException
     * @throws InvalidArgumentException
     */
    public function build(): EntityInterface;
}
