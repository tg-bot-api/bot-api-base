<?php


namespace Greenplugin\TelegramBot\Type;


class UpdateType
{
    public $updateId;
    /**
     * @var MessageType
     */
    public $message;
    /**
     * @var MessageType
     */
    public $editedMessage;
    /**
     * @var MessageType
     */
    public $channelPost;
    /**
     * @var MessageType
     */
    public $editedChannelPost;
    public $inlineQuery;
    public $chosenInlineResult;
    public $callbackQuery;
    public $shippingQuery;
    public $pre_checkoutQuery;
}