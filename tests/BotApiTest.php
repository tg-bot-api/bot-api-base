<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\BotApiHelper;

class BotApiTest extends TestCase
{
    public function testGetEndpoint()
    {
        $this->assertEquals('endpoint', $this->getBot()->getEndPoint());
        $this->assertEquals('endpoint', $this->getBotHelper()->getEndPoint());
    }

    public function testGetBotKey()
    {
        $this->assertEquals('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $this->getBot()->getBotKey());
        $this->assertEquals('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $this->getBotHelper()->getBotKey());
    }

    /**
     * @return BotApi
     */
    private function getBot(): BotApi
    {
        /** @var ApiClientInterface $stub */
        $stub = $this->getMockBuilder(ApiClientInterface::class)->getMock();

        return new BotApi('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, 'endpoint');
    }

    /**
     * @return BotApiHelper
     */
    private function getBotHelper(): BotApiHelper
    {
        return new BotApiHelper($this->getBot());
    }
}
