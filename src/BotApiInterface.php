<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Type\FileType;

interface BotApiInterface
{
    /**
     * @param $method
     * @param $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    public function call($method, $type = null);

    /**
     * @param FileType $file
     *
     * @return string
     */
    public function getAbsoluteFilePath(FileType $file): string;
}
