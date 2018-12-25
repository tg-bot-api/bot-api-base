<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

use Ds\Collection;
use Ds\Traits\GenericCollection;

/**
 * Class PhotoSizeTypeCollection
 * @package Greenplugin\TelegramBot\Type
 */
class PhotoSizeTypeCollection implements \IteratorAggregate, Collection
{
    use GenericCollection;

    /**
     * @var PhotoSizeType[]
     */
    private $photoSizeTypes;

    /**
     * PhotoSizeTypeCollection constructor.
     * @param PhotoSizeType[] $photoSizeTypes
     */
    public function __construct(array $photoSizeTypes)
    {
        $this->photoSizeTypes = $photoSizeTypes;
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
        return count($this->photoSizeTypes);
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
     * Retrieve an external iterator
     * @link https://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \ArrayIterator An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->toArray());
    }
}
