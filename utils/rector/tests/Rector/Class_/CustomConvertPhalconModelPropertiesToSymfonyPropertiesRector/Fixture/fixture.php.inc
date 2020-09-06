<?php

namespace Utils\Rector\Tests\Rector\Class_\CustomConvertPhalconModelPropertiesToSymfonyPropertiesRector\Fixture;

use Utils\Rector\Tests\Rector\Class_\CustomConvertPhalconModelPropertiesToSymfonyPropertiesRector\Fixture\PhalconRest\API\Entity;

final class SomeClass extends \PhalconRest\API\Entity
{
     /** @var integer */
     public $id;
}

?>


-----
<?php

namespace Utils\Rector\Tests\Rector\Class_\CustomConvertPhalconModelPropertiesToSymfonyPropertiesRector\Fixture;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ExampleRepository::class)
 */
final class SomeClass
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;
}

?>
