# telegram-bot-api

[![Telegram bot api][ico-bot-api]][link-bot-api]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
![Total Downloads][ico-php-v]

## Install

Via Composer

``` bash
composer require greenplugin/telegram-bot-api
```

## Usage

We support all psr17 and psr18 implementations, but we will use guzzle6 for example
```bash
composer require php-http/guzzle6-adapter http-interop/http-factory-guzzle
```

```php	
$botKey = '*';

$requestFactory = new Http\Factory\Guzzle\RequestFactory()
$streamFactory = new Http\Factory\Guzzle\StreamFactory();
$client = new Http\Adapter\Guzzle6\Client();

$apiClient = new \TgBotApi\BotApiBase\ApiClient($requestFactory, $streamFactory, $client);
$bot = new \TgBotApi\BotApiBase\BotApi($botKey, $apiClient);

$userId = '*';

$bot->sendMessage(\TgBotApi\BotApiBase\Method\SendMessageMethod::create($userId, 'Hi'));
```

Implemented all methods and types referenced by [official Api](https://core.telegram.org/bots/api) 

To send messages you can use alias `send(SendMessageInterface $message)`

Alias is available for the following methods:
* `SendAnimationMethod`
* `SendAudioMethod`
* `SendContactMethod`
* `SendDocumentMethod`
* `SendGameMethod`
* `SendInvoiceMethod`
* `SendLocationMethod`
* `SendMediaGroupMethod`
* `SendMessageMethod`
* `SendPhotoMethod`
* `SendStickerMethod`
* `SendVenueMethod`
* `SendVideoMethod`
* `SendVideoNoteMethod`
* `SendVoiceMethod`
* `ForwardMessageMethod`


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email wformps@gmail.com instead of using the issue tracker.

## Credits

- [Greenplugin][link-author-1]
- [Big-Shark][link-author-2]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-php-v]: https://img.shields.io/travis/php-v/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-bot-api]: https://img.shields.io/badge/Bot%20API-4.1-blue.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tg-bot-api/bot-api-base/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-last-commit]: https://img.shields.io/github/last-commit/tg-bot-api/bot-api-base.svg?style=flat-square

[link-bot-api]: https://core.telegram.org/bots/api
[link-packagist]: https://packagist.org/packages/tg-bot-api/bot-api-base
[link-travis]: https://travis-ci.org/tg-bot-api/bot-api-base
[link-scrutinizer]: https://scrutinizer-ci.com/g/tg-bot-api/bot-api-base/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tg-bot-api/bot-api-base
[link-downloads]: https://packagist.org/packages/tg-bot-api/bot-api-base
[link-author-1]: https://github.com/greenplugin
[link-author-2]: https://github.com/Big-Shark
[link-contributors]: ../../contributors
