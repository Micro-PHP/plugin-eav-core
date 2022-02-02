<?php

namespace Micro\Plugin\Eav\Entity\Entity;

use DateTimeInterface;

interface EntityInterface
{
    /**
     * @return string|null
     */
    public function getId(): ?string;

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface;

    /**
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface;
}
