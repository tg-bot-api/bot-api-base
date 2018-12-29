<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InputMessageContent;

/**
 * Class InputTextMessageContentType.
 *
 * @see https://core.telegram.org/bots/api#inputtextmessagecontent
 */
class InputTextMessageContentType extends InputMessageContentType
{
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
}
