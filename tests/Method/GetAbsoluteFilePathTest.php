<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use PHPUnit\Framework\TestCase;
use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\Type\FileType;

class GetAbsoluteFilePathTest extends TestCase
{
    public function testMethod()
    {
        /** @var ApiClientInterface $stub */
        $stub = $this->getMockBuilder(ApiClientInterface::class)->getMock();

        $botApi = new BotApiComplete(
            '000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
            $stub,
            new BotApiNormalizer(),
            'endpoint'
        );

        $file = new FileType();
        $file->filePath = 'path';
        $absolutePath = $botApi->getAbsoluteFilePath($file);

        $this->assertEquals('endpoint/file/bot000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/path', $absolutePath);
    }
}
