<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type;

/**
 * Class GameHighScoreType.
 *
 * @see https://core.telegram.org/bots/api#gamehighscore
 */
class GameHighScoreType
{
    /**
     * Position in high score table for the game.
     *
     * @var int
     */
    public $position;

    /**
     * User.
     *
     * @var UserType
     */
    public $user;

    /**
     * Score.
     *
     * @var int
     */
    public $score;
}
