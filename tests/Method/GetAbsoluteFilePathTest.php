<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\BotApiHelper;
use TgBotApi\BotApiBase\Type\FileType;

class GetAbsoluteFilePathTest extends TestCase
{
    public function testMethod()
    {
        /** @var ApiClientInterface $stub */
        $stub = $this->getMockBuilder(ApiClientInterface::class)->getMock();

        $botApi = new BotApiHelper(new BotApi('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, 'endpoint'));

        $file = new FileType();
        $file->filePath = 'path';
        $absolutePath = $botApi->getAbsoluteFilePath($file);

        $this->assertEquals('endpoint/file/bot000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/path', $absolutePath);
    }
}
