<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\Interfaces\EditMethodAliasInterface;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageCaptionMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagecaption
 */
class EditMessageCaptionMethod implements HasParseModeVariableInterface, EditMethodAliasInterface
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * Optional. New caption of the message.
     *
     * @var string|null
     */
    public $caption;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     */
    public $parseMode;

    /**
     * @param $chatId
     * @param int        $messageId
     * @param array|null $data
     *
     * @throws BadArgumentException
     *
     * @return EditMessageCaptionMethod
     */
    public static function create($chatId, int $messageId, array $data = null): EditMessageCaptionMethod
    {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->messageId = $messageId;
        if ($data) {
            $instance->fill($data, ['chatId', 'messageId', 'inlineMessageId']);
        }

        return $instance;
    }

    /**
     * @param string     $inlineMessageId
     * @param array|null $data
     *
     * @throws BadArgumentException
     *
     * @return EditMessageCaptionMethod
     */
    public static function createInline(string $inlineMessageId, array $data = null): EditMessageCaptionMethod
    {
        $instance = new static();
        $instance->inlineMessageId = $inlineMessageId;
        if ($data) {
            $instance->fill($data, ['chatId', 'messageId', 'inlineMessageId']);
        }

        return $instance;
    }
}
