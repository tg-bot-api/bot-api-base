<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

use TgBotApi\BotApiBase\Exception\BadArgumentException;

/**
 * Trait FillFromArrayTrait.
 */
trait FillFromArrayTrait
{
    /**
     * @param array $data
     * @param array $forbidden
     *
     * @throws BadArgumentException
     */
    public function fill(array $data, array $forbidden = []): void
    {
        foreach ($forbidden as $item) {
            if (isset($data[$item])) {
                throw new BadArgumentException(
                    \sprintf('Argument %s is forbidden in %s constructor', $item, static::class)
                );
            }
        }
        foreach ($data as $key => $value) {
            if (!\property_exists($this, $key)) {
                throw new BadArgumentException(\sprintf('Argument %s not found in %s', $key, static::class));
            }
            $this->{$key} = $value;
        }
    }
}
