<?php

declare(strict_types=1);

namespace Utils\Rector\Rector\Class_;

use PhpParser\Node;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\RectorDefinition\CodeSample;
use Rector\Core\RectorDefinition\RectorDefinition;

/**

 * @see \Utils\Rector\Tests\Rector\Class_\CustomConvertPhalconModelPropertiesToSymfonyPropertiesRector\CustomConvertPhalconModelPropertiesToSymfonyPropertiesRectorTest
 */
final class CustomConvertPhalconModelPropertiesToSymfonyPropertiesRector extends AbstractRector
{
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('convert phalcon properties to symfony properties', [
            new CodeSample(
                <<<'PHP'
final class SomeClass extends \PhalconRest\API\Entity
{
     /** @var integer */
     public $id;
}
PHP

                ,
                <<<'PHP'
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
PHP

            )
        ]);
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [\PhpParser\Node\Stmt\Class_::class];
    }

    /**
     * @param \PhpParser\Node\Stmt\Class_ $node
     */
    public function refactor(Node $node): ?Node
    {

        if($node->name == '\PhalconRest\API\Entity'){
            dump('extended PhalconRest Entity');
        }

        return $node;
    }
}
