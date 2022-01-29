<?php

namespace Micro\Plugin\Eav\Exception;


use Micro\Plugin\Eav\Entity\Entity\EntityInterface;

class EntityValidationException extends InvalidArgumentException
{
    /**
     * @param iterable<InvalidArgumentException> $validationExceptionCollection
     * @param EntityInterface $entity
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        private iterable $validationExceptionCollection,
        private EntityInterface $entity,
        int $code = 0,
        ?\Throwable $previous = null)
    {
        parent::__construct('Entity validation failed.', $code, $previous);


    }

    /**
     * @return EntityInterface
     */
    public function getEntity(): EntityInterface
    {
        return $this->entity;
    }

    /**
     * @return iterable<InvalidArgumentException>
     */
    public function getValidationExceptions(): iterable
    {
        return $this->validationExceptionCollection;
    }


}
