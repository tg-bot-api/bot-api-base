<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

use Ds\Collection;
use Ds\Traits\GenericCollection;

/**
 * Class PhotoSizeTypeCollection.
 */
class PhotoSizeTypeCollection implements \IteratorAggregate, Collection
{
    use GenericCollection;

    /**
     * @var PhotoSizeType[]
     */
    private $photoSizeTypes = [];

    /**
     * @todo fix collection denormalization.
     *
     * @param int           $name
     * @param PhotoSizeType $value
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __set($name, $value)
    {
        $this->photoSizeTypes[$name] = new PhotoSizeType(\get_object_vars($value));
    }

    /**
     * Removes all values from the collection.
     */
    public function clear()
    {
        $this->photoSizeTypes = [];

        return $this->photoSizeTypes;
    }

    /**
     * Returns the size of the collection.
     *
     * @return int
     */
    public function count(): int
    {
        return \count($this->photoSizeTypes);
    }

    /**
     * Returns an array representation of the collection.
     *
     * The format of the returned array is implementation-dependent. Some
     * implementations may throw an exception if an array representation
     * could not be created (for example when object are used as keys).
     *
     * @return PhotoSizeType[]
     */
    public function toArray(): array
    {
        return $this->photoSizeTypes;
    }

    /**
     * Retrieve an external iterator.
     *
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->toArray());
    }
}
