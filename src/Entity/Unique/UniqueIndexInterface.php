<?php

namespace Micro\Plugin\Eav\Entity\Unique;

interface UniqueIndexInterface
{
    /**
     * @param string $uniqueKey
     * @return $this
     */
    public function setUniqueKey(string $uniqueKey): self;

    /**
     * @return string
     */
    public function getUniqueKey(): string;
}
