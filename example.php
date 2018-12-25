<?php

declare(strict_types=1);
require __DIR__.'/vendor/autoload.php';

$key = '*';
$proxy = null;
$client = new \Buzz\Client\FileGetContents([
    'proxy' => $proxy,
], new \Nyholm\Psr7\Factory\Psr17Factory());

$bot = new \Greenplugin\TelegramBot\BotApi(new \Greenplugin\TelegramBot\HttpClient($client), $key);

$getMeRequest = new \Greenplugin\TelegramBot\Method\GetMeMethod();
\var_dump($bot->getMe($getMeRequest));
