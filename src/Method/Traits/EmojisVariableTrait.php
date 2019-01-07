<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Method\Traits;

/**
 * Trait EmojisVariableTrait.
 */
trait EmojisVariableTrait
{
    /**
     * One or more emoji corresponding to the sticker.
     *
     * @var string
     */
    public $emojis;

    /**
     * @param string $emoji
     */
    public function addEmoji(string $emoji)
    {
        $this->emojis .= $emoji;
    }
}
