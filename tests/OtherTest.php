<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;

/**
 * Class OtherTest.
 */
class OtherTest extends TestCase
{
    /**
     * @throws BadArgumentException
     */
    public function testFillFromArrayTraitWrongValue()
    {
        $this->expectException(BadArgumentException::class);
        SetChatDescriptionMethod::create('chat_id', ['wrongField' => 'wrongValue']);
    }

    /**
     * @throws BadArgumentException
     */
    public function testFillFromArrayTraitForbiddenValue()
    {
        $this->expectException(BadArgumentException::class);
        SetChatDescriptionMethod::create('chat_id', ['chatId' => 'forbidden']);
    }
}
