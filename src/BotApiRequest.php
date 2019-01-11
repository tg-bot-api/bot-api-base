<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

/**
 * Class BotApiRequest.
 */
class BotApiRequest implements BotApiRequestInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var array
     */
    private $files;

    /**
     * BotApiRequest constructor.
     *
     * @param array $data
     * @param array $files
     */
    public function __construct(array $data, array $files)
    {
        $this->data = $data;
        $this->files = $files;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }
}
