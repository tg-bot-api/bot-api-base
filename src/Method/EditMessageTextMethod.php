<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

use Greenplugin\TelegramBot\Method\Interfaces\HasParseModeVariableInterface;
use Greenplugin\TelegramBot\Method\Traits\EditMessageVariablesTrait;
use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

/**
 * Class EditMessageTextMethod.
 *
 * @see https://core.telegram.org/bots/api#editmessagetext
 */
class EditMessageTextMethod implements HasParseModeVariableInterface
{
    use FillFromArrayTrait;
    use EditMessageVariablesTrait;

    /**
     * New text of the message.
     *
     * @var string
     */
    public $text;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic,
     * fixed-width text or inline URLs in your bot's message.
     *
     * @var string|null
     */
    public $parseMode;

    /**
     * Optional. Disables link previews for links in this message.
     *
     * @var bool|null
     */
    public $disableWebPagePreview;

    /**
     * @param int|string $chatId
     * @param int        $messageId
     * @param string     $text
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageTextMethod
     */
    public static function create($chatId, int $messageId, string $text, array $data = null): EditMessageTextMethod
    {
        $instance = new self();
        $instance->chatId = $chatId;
        $instance->text = $text;
        $instance->messageId = $messageId;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }

    /**
     * @param string     $inlineMessageId
     * @param string     $text
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     *
     * @return EditMessageTextMethod
     */
    public static function createInline(
        string $inlineMessageId,
        string $text,
        array $data = null
    ): EditMessageTextMethod {
        $instance = new self();
        $instance->inlineMessageId = $inlineMessageId;
        $instance->text = $text;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
