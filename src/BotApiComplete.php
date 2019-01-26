<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use TgBotApi\BotApiBase\Traits\AddMethodTrait;
use TgBotApi\BotApiBase\Traits\AnswerMethodTrait;
use TgBotApi\BotApiBase\Traits\CreateMethodTrait;
use TgBotApi\BotApiBase\Traits\DeleteMethodTrait;
use TgBotApi\BotApiBase\Traits\EditMethodTrait;
use TgBotApi\BotApiBase\Traits\ForwardMethodTrait;
use TgBotApi\BotApiBase\Traits\KickMethodTrait;
use TgBotApi\BotApiBase\Traits\LeaveMethodTrait;
use TgBotApi\BotApiBase\Traits\PinMethodTrait;
use TgBotApi\BotApiBase\Traits\PromoteMethodTrait;
use TgBotApi\BotApiBase\Traits\RestrictMethodTrait;
use TgBotApi\BotApiBase\Traits\SendMethodTrait;
use TgBotApi\BotApiBase\Traits\SetMethodTrait;
use TgBotApi\BotApiBase\Traits\StopMethodTrait;
use TgBotApi\BotApiBase\Traits\UnbanMethodTrait;
use TgBotApi\BotApiBase\Traits\UnpinMethodTrait;
use TgBotApi\BotApiBase\Traits\UploadMethodTrait;

/**
 * Class BotApiComplete.
 */
class BotApiComplete extends BotApi
{
    use AddMethodTrait;
    use AnswerMethodTrait;
    use CreateMethodTrait;
    use DeleteMethodTrait;
    use EditMethodTrait;
    use ForwardMethodTrait;
    use KickMethodTrait;
    use LeaveMethodTrait;
    use PinMethodTrait;
    use PromoteMethodTrait;
    use RestrictMethodTrait;
    use SendMethodTrait;
    use SetMethodTrait;
    use StopMethodTrait;
    use UnbanMethodTrait;
    use UnpinMethodTrait;
    use UploadMethodTrait;
}
