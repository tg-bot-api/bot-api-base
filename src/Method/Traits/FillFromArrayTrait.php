<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method\Traits;

use Greenplugin\TelegramBot\Exception\BadArgumentException;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

/**
 * Trait FillFromArrayTrait.
 */
trait FillFromArrayTrait
{
    /**
     * @param array                       $data
     * @param array|null                  $exclude
     * @param NameConverterInterface|null $converter
     *
     * @throws BadArgumentException
     */
    private function fill(array $data, array $exclude = null, NameConverterInterface $converter = null)
    {
        foreach ($data as $key => $value) {
            if ($converter) {
                $key = $converter->denormalize($key);
            }
            if (!\property_exists($this, $key)) {
                throw new BadArgumentException(\sprintf('Argument %s not found in %s', $key, self::class));
            }
            $this->{$key} = $value;
        }
    }
}
