<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\Method\GetMeMethod;

class GetMeMethodTest extends MethodTestCase
{
    public function testEncode()
    {
        $botApi = $this->getBot('getMe', []);

        $botApi->getMe(new GetMeMethod());
    }
}
