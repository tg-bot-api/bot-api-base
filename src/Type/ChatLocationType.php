<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

class ChatLocationType
{
    /**
     * The location to which the supergroup is connected. Can't be a live location.
     *
     * @var LocationType
     */
    public $location;

    /**
     * Location address; 1-64 characters, as defined by the chat owner.
     *
     * @var string
     */
    public $address;
}
