<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\EditMessageVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageCaptionMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagecaption
 */
class EditMessageCaptionMethod implements HasParseModeVariableInterface
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
     * EditMessageCaptionMethod constructor.
     *
     * @param int|string $chatId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct($chatId, array $data = null)
    {
        $this->chatId = $chatId;
        if ($data) {
            $this->fill($data);
        }
    }

    /**
     * @param int|string $chatId
     * @param int        $messageId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageCaptionMethod
     */
    public static function create($chatId, int $messageId, array $data = null): EditMessageCaptionMethod
    {
        $instance = new self($chatId, $data);
        $instance->messageId = $messageId;

        return $instance;
    }

    /**
     * @param int|string $chatId
     * @param string     $inlineMessageId
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageCaptionMethod
     */
    public static function createInline($chatId, string $inlineMessageId, array $data = null): EditMessageCaptionMethod
    {
        $instance = new self($chatId, $data);
        $instance->inlineMessageId = $inlineMessageId;

        return $instance;
    }
}
