<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;

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
     * InlineQueryResultGameType constructor.
     *
     * @param string     $id
     * @param string     $gameShortName
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $id, string $gameShortName, array $data = null)
    {
        $this->type = self::TYPE_GAME;
        $this->id = $id;
        $this->gameShortName = $gameShortName;
        if ($data) {
            $this->fill($data);
        }
    }
}
