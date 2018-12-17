<?php

require __DIR__.'/vendor/autoload.php';

$key = '*';
$proxy = null;
$client = new \Buzz\Client\FileGetContents([
    'proxy' => $proxy,
], new \Nyholm\Psr7\Factory\Psr17Factory());


$bot = new \Greenplugin\TelegramBot\BotApi(new \Greenplugin\TelegramBot\HttpClient($key, $client));

$getMeRequest = new \Greenplugin\TelegramBot\Request\GetMeRequest();
var_dump($bot->getMe($getMeRequest));