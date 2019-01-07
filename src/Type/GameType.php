<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class GameType.
 *
 * @see https://core.telegram.org/bots/api#game
 */
class GameType
{
    /**
     * Title of the game.
     *
     * @var string
     */
    public $title;

    /**
     * Description of the game.
     *
     * @var string
     */
    public $description;

    /**
     * Photo that will be displayed in the game message in chats.
     *
     * @var PhotoSizeType[]
     */
    public $photo;

    /**
     * Brief description of the game or high scores included in the game message.
     * Can be automatically edited to include current high scores for the game when the bot calls setGameScore,
     * or manually edited using editMessageText. 0-4096 characters.
     *
     * @var string
     */
    public $text;

    /**
     * Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     *
     * @var MessageEntityType[]|null
     */
    public $textEntities;

    /**
     * Optional. Animation that will be displayed in the game message in chats. Upload via BotFather.
     *
     * @var AnimationType|null
     */
    public $animation;
}
