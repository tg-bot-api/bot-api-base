<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method\Traits;

use Greenplugin\TelegramBot\Exception\BadArgumentException;

/**
 * Trait FillFromArrayTrait.
 */
trait FillFromArrayTrait
{
    /**
     * @param array $data
     *
     * @throws BadArgumentException
     */
    private function fill(array $data)
    {
        foreach ($data as $key => $value) {
            if (!\property_exists($this, $key)) {
                throw new BadArgumentException(\sprintf('Argument %s not found in %s', $key, self::class));
            }
            $this->{$key} = $value;
        }
    }
}
