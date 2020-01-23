<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Interfaces;

/**
 * Interface HasCaptionVariableInterface.
 */
interface HasParseModeVariableInterface
{
    public const PARSE_MODE_HTML = 'HTML';

    /**
     * @see https://core.telegram.org/bots/api#markdownv2-style
     */
    public const PARSE_MODE_MARKDOWN_V2 = 'MarkdownV2';

    /**
     * @deprecated
     * @see HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2
     */
    public const PARSE_MODE_MARKDOWN = 'Markdown';
}
