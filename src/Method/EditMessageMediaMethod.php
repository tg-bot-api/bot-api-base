<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Traits\EditMessageVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputFileType;
use Greenplugin\TelegramBot\Type\InputMediaType;

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
     * EditMessageMediaMethod constructor.
     *
     * @param int|string    $chatId
     * @param InputFileType $media
     * @param array|null    $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, InputFileType $media, array $data = null)
    {
        $this->chatId = $chatId;
        $this->media = $media;
        if ($data) {
            $this->fill($data);
        }
    }

    /**
     * @param int|string    $chatId
     * @param int           $messageId
     * @param InputFileType $media
     * @param array|null    $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageMediaMethod
     */
    public static function create(
        $chatId,
        int $messageId,
        InputFileType $media,
        array $data = null
    ): EditMessageMediaMethod {
        $instance = new self($chatId, $media, $data);
        $instance->messageId = $messageId;

        return $instance;
    }

    /**
     * @param int|string    $chatId
     * @param string        $inlineMessageId
     * @param InputFileType $media
     * @param array|null    $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageMediaMethod
     */
    public static function createInline(
        $chatId,
        string $inlineMessageId,
        InputFileType $media,
        array $data = null
    ): EditMessageMediaMethod {
        $instance = new self($chatId, $media, $data);
        $instance->inlineMessageId = $inlineMessageId;

        return $instance;
    }
}
