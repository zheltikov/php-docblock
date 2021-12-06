<?php

namespace Zheltikov\DocBlock;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlockFactory;

/**
 *
 */
class ParserHelper
{
    /**
     * @var \phpDocumentor\Reflection\DocBlock
     */
    protected DocBlock $docblock;

    // -------------------------------------------------------------------------

    /**
     * @param string|object $docblock
     */
    public function __construct($docblock)
    {
        $this->docblock = DocBlockFactory::createInstance()
            ->create($docblock);
    }

    // -------------------------------------------------------------------------

    /**
     * @return \phpDocumentor\Reflection\DocBlock
     */
    public function getDocBlock(): DocBlock
    {
        return $this->docblock;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasTag(string $name): bool
    {
        return $this->getDocBlock()->hasTag($name);
    }

    /**
     * @param string $name
     * @return int
     */
    public function countTag(string $name): int
    {
        $counter = 0;

        foreach ($this->getDocBlock()->getTags() as $tag) {
            if ($tag->getName() === $name) {
                $counter++;
            }
        }

        return $counter;
    }

    /**
     * @param string $name
     * @return \phpDocumentor\Reflection\DocBlock\Tag|null
     */
    public function getFirstTagByName(string $name): ?DocBlock\Tag
    {
        foreach ($this->getDocBlock()->getTags() as $tag) {
            if ($tag->getName() === $name) {
                return $tag;
            }
        }

        return null;
    }

    /**
     * @param string $name
     * @return string|null
     */
    public function getFirstTagValueByName(string $name): ?string
    {
        $tag = $this->getFirstTagByName($name);

        if ($tag === null) {
            return null;
        }

        return (string) $tag;
    }
}
