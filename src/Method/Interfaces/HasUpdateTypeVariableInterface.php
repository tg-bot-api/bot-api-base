<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Interfaces;

/**
 * Interface HasUpdateTypeVariableInterface.
 */
interface HasUpdateTypeVariableInterface
{
    const TYPE_MESSAGE = 'message';
    const TYPE_EDITED_MESSAGE = 'edited_message';
    const TYPE_CHANNEL_POST = 'channel_post';
    const TYPE_EDITED_CHANNEL_POST = 'edited_channel_post';
    const TYPE_INLINE_QUERY = 'inline_query';
    const TYPE_CHOSEN_INLINE_RESULT = 'chosen_inline_result';
    const TYPE_CALLBACK_QUERY = 'callback_query';
    const TYPE_SHIPPING_QUERY = 'shipping_query';
    const TYPE_PRE_CHECKOUT_QUERY = 'pre_checkout_query';
}
