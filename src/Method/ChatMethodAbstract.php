<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;


/**
 * Class ChatMethodAbstract
 */
abstract class ChatMethodAbstract
{
    /**
     * Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @var integer|string
     */
    public $chatId;
}
