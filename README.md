# Micro Framework Doctrine Component (WIP)

Micro Framework plugin. Entity Attribute Value (EAV) supports.

## Installation

Use the package manager [Composer](https://getcomposer.org/) to install.

```bash
composer require micro/plugin-doctrine
```

## Basic Configure

#### 1. Use one of available adapters

 1. micro/plugin-eav-doctrine
 
## Basic Usage

#### Programmatically create EAV Schema with attributes

```php

use Micro\Plugin\Eav\EavFacadeInterface;

$eavFacade = $container->get(EavFacadeInterface::class);
$eavFacade
    ->buildSchema()
        ->setName('Book')
        ->addAttribute('title')
            ->setLength(100)
            ->setIsUnique(true)
            ->setDescription('Book title')
            ->setType('string')
            ->setIsNullable(true)
            ->complete()
        ->addAttribute('author')
            ->complete()
    ->force()
    ->build();
```

## Other docs

* ### [Examples](docs/Examples.md)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](LICENSE)
