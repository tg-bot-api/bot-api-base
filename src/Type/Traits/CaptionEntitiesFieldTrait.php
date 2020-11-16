<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Type\Traits;

use TgBotApi\BotApiBase\Type\MessageEntityType;

trait CaptionEntitiesFieldTrait
{
    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode.
     *
     * @var MessageEntityType[]|null
     */
    public $captionEntities;
}
