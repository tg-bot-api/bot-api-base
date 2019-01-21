<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Interfaces;

/**
 * Interface HasUpdateTypeVariableInterface.
 */
interface HasUpdateTypeVariableInterface
{
    public const TYPE_MESSAGE = 'message';
    public const TYPE_EDITED_MESSAGE = 'edited_message';
    public const TYPE_CHANNEL_POST = 'channel_post';
    public const TYPE_EDITED_CHANNEL_POST = 'edited_channel_post';
    public const TYPE_INLINE_QUERY = 'inline_query';
    public const TYPE_CHOSEN_INLINE_RESULT = 'chosen_inline_result';
    public const TYPE_CALLBACK_QUERY = 'callback_query';
    public const TYPE_SHIPPING_QUERY = 'shipping_query';
    public const TYPE_PRE_CHECKOUT_QUERY = 'pre_checkout_query';
}
