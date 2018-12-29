<?php

declare(strict_types=1);
require __DIR__.'/vendor/autoload.php';

$key = '*';
$proxy = '*';

$client = new \Buzz\Client\Curl([
    'timeout' => 120,
    'proxy' => $proxy,
], new \Nyholm\Psr7\Factory\Psr17Factory());

$apiClient = new \Greenplugin\TelegramBot\ApiClient(new \Nyholm\Psr7\Factory\Psr17Factory(), new \Nyholm\Psr7\Factory\Psr17Factory(), $client);
$bot = new \Greenplugin\TelegramBot\BotApi($key, $apiClient);

$getMeRequest = new \Greenplugin\TelegramBot\Method\GetMeMethod();
\var_dump($bot->getMe($getMeRequest));
