<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class SendMessageMethod
 * @link https://core.telegram.org/bots/api#sendmessage
 */
class SendMessageMethod extends SendMethodAbstract
{
    const PARSE_MODE_HTML = 'HTML';
    const PARSE_MODE_MARKDOWN = 'Markdown';

    /**
     * Text of the message to be sent
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
     * Optional. Disables link previews for links in this message
     *
     * @var boolean|null
     */
    public $disableWebPagePreview;
}
