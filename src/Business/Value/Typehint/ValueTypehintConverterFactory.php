<?php

namespace Micro\Plugin\Eav\Business\Value\Typehint;


class ValueTypehintConverterFactory implements ValueTypehintConverterFactoryInterface
{
    /**
     * @param iterable<ValueTypehintConverterInterface::class> $typehintConverterCollection
     */
    public function __construct(private iterable $typehintConverterClassCollection)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function create(string $attributeType): ValueTypehintConverterInterface
    {
        foreach ($this->typehintConverterClassCollection as $typehintConverterClass) {

            $this->validateConverterClass($typehintConverterClass);

            if($typehintConverterClass::supports($attributeType)) {
                return $this->createConverter($typehintConverterClass);
            }
        }

        throw new \RuntimeException(sprintf('Converter for type "%s" is not supported', $attributeType));
    }

    /**
     * @param string $converterType
     *
     * @return ValueTypehintConverterInterface
     */
    protected function createConverter(string $converterType): ValueTypehintConverterInterface
    {
        return new $converterType();
    }

    /**
     * @param string $converterClass
     *
     * @return void
     */
    private function validateConverterClass(string $converterClass): void
    {
        if(!class_exists($converterClass)) {
            throw new \RuntimeException(sprintf('Class "%s" is not exists and can not be autoload.', $converterClass));
        }

        $implements = class_implements($converterClass);
        $typehintInterface = ValueTypehintConverterInterface::class;

        if(!in_array($typehintInterface, $implements, true)) {
            throw new \RuntimeException(sprintf('Class "%s" should be implements "%s".', $converterClass, $typehintInterface));
        }
    }
}
