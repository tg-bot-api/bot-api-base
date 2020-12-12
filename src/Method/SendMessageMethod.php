<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Interfaces\SendMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Method\Traits\SendToChatVariablesTrait;
use TgBotApi\BotApiBase\Type\MessageEntityType;

/**
 * Class SendMessageMethod.
 *
 * @see https://core.telegram.org/bots/api#sendmessage
 */
class SendMessageMethod implements HasParseModeVariableInterface, SendMethodAliasInterface
{
    use FillFromArrayTrait;
    use SendToChatVariablesTrait;

    /**
     * Text of the message to be sent.
     *
     * @var string
     */
    public $text;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width
     * text or inline URLs in the media caption.
     *
     * @var string|null
     */
    public $parseMode;

    /**
     * Optional. List of special entities that appear in message text, which can be specified instead of parse_mode.
     *
     * @var MessageEntityType[]|null
     */
    public $entities;

    /**
     * Optional. Disables link previews for links in this message.
     *
     * @var bool|null
     */
    public $disableWebPagePreview;

    /**
     * @param int|string $chatId
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create($chatId, string $text, array $data = null): SendMessageMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->text = $text;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
