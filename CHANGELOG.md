# Changelog

All notable changes to `telegram-bot-api` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## NEXT - YYYY-MM-DD

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.2.0-beta - 2019-01-15

Added webhook fetcher.

Method `fetch()` of WebhookFetcher handling Psr\Http\Message\RequestInterface or string and always returns instance of UpdateType or throwing BadRequestException.
```php
$fetcher = new \TgBotApi\BotApiBase\WebhookFetcher(new \TgBotApi\BotApiBase\BotApiNormalizer());
$update = $fetcher->fetch($request);
```

## 0.1.0-beta - 2019-01-11

Implemented all methods and types referenced by [official Api](https://core.telegram.org/bots/api)
