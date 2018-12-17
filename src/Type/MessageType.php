<?php


namespace Greenplugin\TelegramBot\Type;

/**
 * Class MessageType
 * @see https://core.telegram.org/bots/api#message
 */
class MessageType
{
    /**
     * Unique message identifier inside this chat.
     * @var Integer
     */
    public $messageId;

    /**
     * Optional. Sender, empty for messages sent to channels.
     * @var UserType|null
     */
    public $from;

    /**
     * Date the message was sent in Unix time.
     * @var Integer
     */
    public $date;

    /**
     * Conversation the message belongs to.
     * @var ChatType
     */
    public $chat;

    /**
     * Optional. For forwarded messages, sender of the original message.
     * @var UserType|null
     */
    public $forwardFrom;

    /**
     * Optional. For messages forwarded from channels, information about the original channel.
     * @var ChatType|null
     */
    public $forwardFromChat;

    /**
     * Optional. For messages forwarded from channels, identifier of the original message in the channel.
     * @var Integer|null
     */
    public $forwardFromMessageId;

    /**
     * Optional. For messages forwarded from channels, signature of the post author if present.
     * @var String|null
     */
    public $signature;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time.
     * @var Integer|null
     */
    public $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain
     * further reply_to_message fields even if it itself is a reply.
     * @var MessageType|null
     */
    public $replyToMessage;

    /**
     * Optional. Date the message was last edited in Unix time
     * @var Integer|null
     */
    public $editDate;

    /**
     * Optional. The unique identifier of a media message group this message belongs to
     * @var String|null
     */
    public $mediaGroupId;

    /**
     * Optional. Signature of the post author for messages in channels
     * @var String|null
     */
    public $authorSignature;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message, 0-4096 characters.
     * @var String|null
     */
    public $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     * @var MessageEntityType[]|null
     */
    public $entities;

    /**
     * Optional. For messages with a caption, special entities like usernames, URLs, bot commands,
     * etc. that appear in the caption
     * @var MessageEntityType[]|null
     */
    public $captionEntities;

    /**
     * Optional. Message is an audio file, information about the file
     * @var AudioType|null
     */
    public $audio;

    /**
     * Optional. Message is a general file, information about the file.
     * @var DocumentType|null
     */
    public $document;

    /**
     * Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
     * @var AnimationType|null
     */
    public $animation;

    /**
     * @see https://core.telegram.org/bots/api#games
     * Optional. Message is a game, information about the game.
     * @var GameType|null
     */
    public $game;

    /**
     * Optional. Message is a photo, available sizes of the photo.
     * @var PhotoSizeType[]|null
     */
    public $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     * @var StickerType|null
     */
    public $sticker;

    /**
     * Optional. Message is a video, information about the video
     * @var VideoType|null
     */
    public $video;

    /**
     * Optional. Message is a voice message, information about the file
     * @var VoiceType|null
     */
    public $voice;

    /**
     * @see https://telegram.org/blog/video-messages-and-telescope
     * Optional. Message is a video note, information about the video message
     * @var VideoNoteType|null
     */
    public $videoNote;

    /**
     * Optional. Caption for the audio, document, photo, video or voice, 0-1024 characters
     * @var String|null
     */
    public $caption;

    /**
     * Optional. Message is a shared contact, information about the contact
     * @var ContactType|null
     */
    public $contact;

    /**
     * Optional. Message is a shared location, information about the location
     * @var LocationType|null
     */
    public $location;

    /**
     * Optional. Message is a venue, information about the venue
     * @var VenueType|null
     */
    public $venue;

    /**
     * Optional. New members that were added to the group or supergroup and information about them
     * (the bot itself may be one of these members)
     * @var UserType[]|null
     */
    public $newChatMembers;

    /**
     * Optional. A member was removed from the group, information about them (this member may be the bot itself).
     * @var UserType|null
     */
    public $leftChatMembers;

    /**
     * Optional. A chat title was changed to this value
     * @var String|null
     */
    public $newChatTitle;

    /**
     * Optional. A chat photo was change to this value.
     * @var PhotoSizeType[]|null
     */
    public $newChatPhoto;

    /**
     * Optional. Service message: the chat photo was deleted
     * @var Boolean|null
     */
    public $deleteChatPhoto;

    /**
     * Optional. Service message: the group has been created
     * @var Boolean|null
     */
    public $groupChanelCreated;

    /**
     * Optional. Service message: the supergroup has been created. This field can‘t be received in a message coming
     * through updates, because bot can’t be a member of a supergroup when it is created. It can only be found in
     * reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @var Boolean|null
     */
    public $supergroupChatCreated;

    /**
     * Optional. Service message: the channel has been created. This field can‘t be received in a message coming
     * through updates, because bot can’t be a member of a channel when it is created. It can only be found in
     * reply_to_message if someone replies to a very first message in a channel.
     * @var Boolean|null
     */
    public $channelChatCreated;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. This number may be
     * greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it.
     * But it is smaller than 52 bits, so a signed 64 bit integer or double-precision
     * float type are safe for storing this identifier.
     * @var Integer|null
     */
    public $migrateToChat;

    //migrate_from_chat_id
    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may have difficulty/silent
     * defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer
     * or double-precision float type are safe for storing this identifier.
     * @var Integer|null
     */
    public $migrateFromChat;

    /**
     * Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
     * @var MessageType|null
     */
    public $pinnedMessage;

    /**
     * @see https://core.telegram.org/bots/api#payments
     * Message is an invoice for a payment, information about the invoice.
     * @var InvoiceType|null
     */
    public $invoice;

    //successful_payment	SuccessfulPayment
    /**
     * @see https://core.telegram.org/bots/api#payments
     * Optional. Message is a service message about a successful payment, information about the payment.
     * @var SuccessfulPaymentType|null
     */
    public $successfulPayment;

    /**
     * @see https://core.telegram.org/widgets/login
     * Optional. The domain name of the website on which the user has logged in.
     * @var String|null
     */
    public $connectedWebsite;

    /**
     * Optional. Telegram Passport data
     * @var PassportData|null
     */
    public $passportData;
}