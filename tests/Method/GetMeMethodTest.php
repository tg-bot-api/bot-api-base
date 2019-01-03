<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\Method\GetMeMethod;

class GetMeMethodTest extends MethodTestCase
{
    /**
     * @throws \Greenplugin\TelegramBot\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBot('getMe', []);

        $botApi->getMe(GetMeMethod::create());
    }
}
