<?php
declare(strict_types=1);

namespace Greenplugin\TelegramBot;


interface HttpClientInterface
{

    /**
     * @param string $path
     * @return mixed
     */
    public function get(string $path);

    /**
     * @param string $path
     * @param array $data
     * @return mixed
     */
    public function post(string $path, array $data);
}