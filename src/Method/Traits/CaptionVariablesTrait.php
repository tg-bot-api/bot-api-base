<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

use TgBotApi\BotApiBase\Type\Traits\CaptionEntitiesFieldTrait;

trait CaptionVariablesTrait
{
    use CaptionEntitiesFieldTrait;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width
     * text or inline URLs in the media caption.
     *
     * @var string|null
     */
    public $parseMode;

    /**
     * Optional. Media caption (may also be used when resending photos by file_id), 0-1024 characters\.
     *
     * @var string|null
     */
    public $caption;
}
