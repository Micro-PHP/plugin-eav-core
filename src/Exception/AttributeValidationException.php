<?php

namespace Micro\Plugin\Eav\Exception;

use Micro\Plugin\Eav\Entity\Attribute\AttributeInterface;

class AttributeValidationException extends InvalidArgumentException
{
    /**
     * @param AttributeInterface $attribute
     * @param mixed $value
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(private AttributeInterface $attribute, private mixed $value , int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct(
            sprintf('Attribute "%s" value "%s" is not valid',
                $this->attribute->getName(),
                (string)$this->value
            ),
            $code,
            $previous
        );
    }
}
