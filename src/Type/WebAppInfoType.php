<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

use TgBotApi\BotApiBase\Exception\BadArgumentException;

/**
 * Class MenuButtonType.
 *
 * @see https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfoType
{
    /**
     * An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     *
     * @var string
     */
    public $url;

    /**
     * @param string     $url
     *
     * @throws BadArgumentException
     *
     * @return WebAppInfoType
     */
    public static function create(string $url): WebAppInfoType
    {
        $instance = new static();
        $instance->url = $url;

        return $instance;
    }
}
