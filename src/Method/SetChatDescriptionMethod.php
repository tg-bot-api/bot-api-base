<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class SetChatDescriptionMethod
 * @link https://core.telegram.org/bots/api#setchatdescription
 */
class SetChatDescriptionMethod extends ChatMethodAbstract
{
    /**
     * Optional. New chat description, 0-255 characters.
     *
     * @var string|null
     */
    public $description;
}
