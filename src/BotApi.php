<?php

namespace Greenplugin\TelegramBot;

class BotApi implements BotApiInterface
{
    const BOT_SRC = 'https://api.telegram.org/bot';

    private $key;

    /**
     * Create a new Skeleton Instance
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }
}
