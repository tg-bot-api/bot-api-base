<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot;


interface HttpClientInterface
{

    public function get(string $path);

    public function post(string $path, array $data);
}