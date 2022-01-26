<?php

namespace Micro\Plugin\Eav\Entity\Value;

interface ValueInterface
{
    /**
     * @return mixed
     */
    public function getValue(): mixed;

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue(mixed $value): self;

    /**
     * @return string
     */
    public function __toString(): string;
}
