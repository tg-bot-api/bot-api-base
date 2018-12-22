<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot\Method;

/**
 * Class GetUpdatesMethod
 * @link https://core.telegram.org/bots/api#getupdates
 */
class GetUpdatesMethod
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

    /**
     * Optional. Identifier of the first update to be returned.
     * Must be greater by one than the highest among the identifiers of previously received updates.
     * By default, updates starting with the earliest unconfirmed update are returned.
     * An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id.
     * The negative offset can be specified to retrieve updates starting from -offset update
     * from the end of the updates queue. All previous updates will forgotten.
     *
     * @var integer|null
     */
    public $offset;

    /**
     * Optional. Limits the number of updates to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     *
     * @var integer|null
     */
    public $limit;

    /**
     * Optional. Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling.
     * Should be positive, short polling should be used for testing purposes only.
     *
     * @var integer|null
     */
    public $timeout;

    /**
     * Optional. List the types of updates you want your bot to receive.
     * For example, specify [“message”, “edited_channel_post”, “callback_query”]
     * to only receive updates of these types.
     * See Update for a complete list of available update types.
     * Specify an empty list to receive all updates regardless of type (default).
     * If not specified, the previous setting will be used.
     *
     * Please note that this parameter doesn't affect updates created before the call to the getUpdates,
     * so unwanted updates may be received for a short period of time.
     *
     * @var string[]|null
     */
    public $allowed_updates;
}
