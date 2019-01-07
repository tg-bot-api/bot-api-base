<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\InlineQueryResult;

use TgBotApi\BotApiBase\Method\Traits\FillFromArrayTrait;

/**
 * Class InlineQueryResultGameType.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgame
 */
class InlineQueryResultGameType extends InlineQueryResultType
{
    use FillFromArrayTrait;

    /**
     * Short name of the game.
     *
     * @var string
     */
    public $gameShortName;

    /**
     * @param string     $id
     * @param string     $gameShortName
     * @param array|null $data
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return InlineQueryResultGameType
     */
    public static function create(string $id, string $gameShortName, array $data = null): InlineQueryResultGameType
    {
        $instance = new static();
        $instance->type = static::TYPE_GAME;
        $instance->id = $id;
        $instance->gameShortName = $gameShortName;
        if ($data) {
            $instance->fill($data);
        }

        return $instance;
    }
}
