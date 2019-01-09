<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Helper;

use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\ExportChatInviteLinkMethod;

/**
 * Trait ExportMethodTrait.
 */
trait ExportMethodTrait
{
    /**
     * @param $method
     * @param $type
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return mixed
     */
    abstract public function call($method, $type = null);

    /**
     * @param ExportChatInviteLinkMethod $method
     *
     * @throws NormalizationException
     * @throws ResponseException
     *
     * @return string
     */
    public function exportChatInviteLink(ExportChatInviteLinkMethod $method): string
    {
        return $this->call($method);
    }
}
