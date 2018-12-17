<?php


namespace Greenplugin\TelegramBot\Request;

class GetUpdatesRequest
{
    public $offset;
    public $limit;
    public $timeout;
    public $allowed_updates;
}