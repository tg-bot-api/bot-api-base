<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InputMessageContent;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

/**
 * Class InputTextMessageContentType.
 *
 * @see https://core.telegram.org/bots/api#inputtextmessagecontent
 */
class InputTextMessageContentType extends InputMessageContentType implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use CaptionEntitiesFieldTrait;

    /**
     * Text of the message to be sent, 1-4096 characters.
     *
     * @var string
     */
    public $messageText;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in your bot's message.
     *
     * @var string|null
     */
    public $parseMode;

    /**
     * Optional. Disables link previews for links in the sent message.
     *
     * @var bool|null
     */
    public $disableWebPagePreview;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public static function create(string $messageText, array $data = null): InputTextMessageContentType
    {
        $instance = new static();
        $instance->messageText = $messageText;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
