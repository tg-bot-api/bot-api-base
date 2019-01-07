<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method;

use TgBotApi\BotApiBase\Method\Traits\EditMessageVariablesTrait;
use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaType;

/**
 * Class EditMessageMediaMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagemedia
 */
class EditMessageMediaMethod
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * A JSON-serialized object for a new media content of the message.
     *
     * @var InputMediaType
     */
    public $media;

    /**
     * @param int|string    $chatId
     * @param int           $messageId
     * @param InputFileType $media
     * @param array|null    $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return EditMessageMediaMethod
     */
    public static function create(
        $chatId,
        int $messageId,
        InputFileType $media,
        array $data = null
    ): EditMessageMediaMethod {
        $instance = new static();
        $instance->chatId = $chatId;
        $instance->media = $media;
        $instance->messageId = $messageId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }

    /**
     * @param string        $inlineMessageId
     * @param InputFileType $media
     * @param array|null    $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return EditMessageMediaMethod
     */
    public static function createInline(
        string $inlineMessageId,
        InputFileType $media,
        array $data = null
    ): EditMessageMediaMethod {
        $instance = new static();
        $instance->inlineMessageId = $inlineMessageId;
        $instance->media = $media;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
