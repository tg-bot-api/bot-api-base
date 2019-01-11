<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Interface BotApiRequestInterface.
 */
interface BotApiRequestInterface
{
    /**
     * @return array
     */
    public function getData(): array;

    /**
     * @return array
     */
    public function getFiles(): array;
}
