# Telegram Bot Api Base

[![Telegram bot api][ico-bot-api]][link-bot-api]
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![PHP Version >= 7.2][ico-php-v]][link-php-7-2]
[![Symfony Recipe][ico-symfony-recipe]][link-symfony-recipe]

[![Quality Gate Status][sonar-gate-status-icon]][sonar-path]
[![Bugs][sonar-bugs-icon]][sonar-path]
[![Duplicated Lines (%)][sonar-duplicated-lines-icon]][sonar-path]
[![Security Rating][sonar-security-rating-icon]][sonar-path]

#### Supported Telegram Bot API 5.0 (November 4, 2020)

## Installation

Via Composer

``` bash
composer require tg-bot-api/bot-api-base --prefer-dist
```

## Usage

We support all psr17 and psr18 implementations, but we will use guzzle6 for example
```bash
composer require php-http/guzzle6-adapter http-interop/http-factory-guzzle --prefer-dist
```

```php
$botKey = '<bot key>';

$requestFactory = new Http\Factory\Guzzle\RequestFactory();
$streamFactory = new Http\Factory\Guzzle\StreamFactory();
$client = new Http\Adapter\Guzzle6\Client();

$apiClient = new \TgBotApi\BotApiBase\ApiClient($requestFactory, $streamFactory, $client);
$bot = new \TgBotApi\BotApiBase\BotApi($botKey, $apiClient, new \TgBotApi\BotApiBase\BotApiNormalizer());

$userId = '<user id>';

$bot->send(\TgBotApi\BotApiBase\Method\SendMessageMethod::create($userId, 'Hi'));
```

You can configure it to work in symfony, for example, in [this way](https://gist.github.com/greenplugin/09179bee606aa01b1ee00d049ab78fc4).

If you want to use your own api server - you can set url as 4th param in bot api

```php 
$bot = new \TgBotApi\BotApiBase\BotApi('<bot key>', $apiClient, new \TgBotApi\BotApiBase\BotApiNormalizer(), '<your-domain>');
```

### Allowed methods:

|Method|Allowed type|response|
|:--|:--|:--|
|`add`|AddStickerToSetMethod|bool|
|`answer`|AnswerCallbackQueryMethod, AnswerInlineQueryMethod, AnswerPreCheckoutQueryMethod, AnswerShippingQueryMethod|bool|
|`create`|CreateNewStickerSetMethod|bool|
|`delete`|DeleteChatPhotoMethod, DeleteChatStickerSetMethod, DeleteMessageMethod, DeleteStickerFromSetMethod, DeleteWebhookMethod|bool|
|`edit`|EditMessageCaptionMethod, EditMessageLiveLocationMethod, EditMessageMediaMethod, EditMessageReplyMarkupMethod, EditMessageTextMethod|bool|
|`forward`|ForwardMessageMethod|MessageType|
|`kick`|KickChatMemberMethod|bool|
|`leave`|LeaveChatMethod|bool|
|`pin`|PinChatMessageMethod|bool|
|`promote`|PromoteChatMemberMethod|bool|
|`restrict`|RestrictChatMemberMethod|bool|
|`send`|SendPhotoMethod, SendAudioMethod, SendDocumentMethod, SendVideoMethod, SendAnimationMethod, SendVoiceMethod, SendVideoNoteMethod, SendGameMethod, SendInvoiceMethod, SendLocationMethod, SendVenueMethod, SendContactMethod, SendStickerMethod, SendMessageMethod, SendPollMethod, SendDiceMethod|MessageType|
|`set`|SetChatDescriptionMethod, SetChatPhotoMethod, SetChatStickerSetMethod, SetChatTitleMethod, SetGameScoreMethod, SetStickerPositionInSetMethod, SetWebhookMethod, SetPassportDataErrorsMethod, SetChatPermissionsMethod, SetChatAdministratorCustomTitleMethod, SetMyCommandMethod, SetStickerSetThumbMethod|bool|
|`stop`|StopMessageLiveLocationMethod|bool|
|`stopPoll`|StopPollMethod|Poll|
|`unban`|UnbanChatMemberMethod|bool|
|`unpin`|UnpinChatMessageMethod, UnpinAllChatMessagesMethod|bool|
|`upload`|UploadStickerFileMethod|FileType|
|`exportChatInviteLink`|ExportChatInviteLinkMethod|string|
|`sendChatAction`|SendChatActionMethod|bool|
|`getUpdates`|GetUpdatesMethod|UpdateType[]|
|`getMe`|GetMeMethod|UserType|
|`getMyCommands`|GetMyCommandsMethod|BotCommandType|
|`getUserProfilePhotos`|GetUserProfilePhotosMethod|UserProfilePhotosType|
|`getWebhookInfo`|GetWebhookInfoMethod|WebhookInfoType|
|`getChatMembersCount`|GetChatMembersCountMethod|int|
|`getChat`|GetChatMethod|ChatType|
|`getChatAdministrators`|GetChatAdministratorsMethod|ChatMemberType[]|
|`getChatMember`|GetChatMemberMethod|ChatMemberType|
|`getGameHighScores`|GetGameHighScoresMethod|GameHighScoreType[]|
|`getStickerSet`|GetStickerSetMethod|StickerSetType|
|`getFile`|GetFileMethod|FileType|
|`sendMediaGroup`|SendMediaGroupMethod|MessageType[]|
|`getAbsoluteFilePath`|FileType|string|
|`logOut`|LogOutMethod|bool|
|`close`|CloseMethod|bool|
|`copyMessage`|CopyMessageMethod|MessageIdType|
|`call($method, [string $type])`|any method class, [optional expected type]|array or excepted type object|

Implemented all methods and types referenced by [official Api](https://core.telegram.org/bots/api)

You can use  `BotApiComplete` instance as helper to call 
all methods from [official Api](https://core.telegram.org/bots/api) like this:

```php
$botKey = '<bot key>';

$requestFactory = new Http\Factory\Guzzle\RequestFactory()
$streamFactory = new Http\Factory\Guzzle\StreamFactory();
$client = new Http\Adapter\Guzzle6\Client();

$apiClient = new \TgBotApi\BotApiBase\ApiClient($requestFactory, $streamFactory, $client);
$bot = new \TgBotApi\BotApiBase\BotApiComplete($botKey, $apiClient, new \TgBotApi\BotApiBase\BotApi\BotApiNormalizer());

$userId = '<user id>';

$bot->sendMessage(\TgBotApi\BotApiBase\Method\SendMessageMethod::create($userId, 'Hi'));
```
[Learn api](https://tg-bot-api.github.io/bot-api-base/api/)
### Fetching webhooks

Method `fetch()` of WebhookFetcher handling Psr\Http\Message\RequestInterface or string and always returns instance of UpdateType or throwing BadRequestException.

```php
$fetcher = new \TgBotApi\BotApiBase\WebhookFetcher(new \TgBotApi\BotApiBase\BotApiNormalizer());
$update = $fetcher->fetch($request);
```

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
[ico-bot-api]: https://img.shields.io/badge/Bot%20API-5.0-blue.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tg-bot-api/bot-api-base/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-last-commit]: https://img.shields.io/github/last-commit/tg-bot-api/bot-api-base.svg?style=flat-square
[ico-symfony-recipe]: https://img.shields.io/badge/Symfony%20Recipe-available-brightgreen

[sonar-gate-status-icon]: https://sonarcloud.io/api/project_badges/measure?project=tg-bot-api_bot-api-base&metric=alert_status
[sonar-bugs-icon]: https://sonarcloud.io/api/project_badges/measure?project=tg-bot-api_bot-api-base&metric=bugs
[sonar-duplicated-lines-icon]: https://sonarcloud.io/api/project_badges/measure?project=tg-bot-api_bot-api-base&metric=duplicated_lines_density
[sonar-security-rating-icon]: https://sonarcloud.io/api/project_badges/measure?project=tg-bot-api_bot-api-base&metric=security_rating
[sonar-bugs-icon]: https://sonarcloud.io/api/project_badges/measure?project=tg-bot-api_bot-api-base&metric=bugs


[link-bot-api]: https://core.telegram.org/bots/api
[link-packagist]: https://packagist.org/packages/tg-bot-api/bot-api-base
[link-travis]: https://travis-ci.org/tg-bot-api/bot-api-base
[link-scrutinizer]: https://scrutinizer-ci.com/g/tg-bot-api/bot-api-base/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tg-bot-api/bot-api-base
[link-downloads]: https://packagist.org/packages/tg-bot-api/bot-api-base
[link-author-1]: https://github.com/greenplugin
[link-author-2]: https://github.com/Big-Shark
[link-contributors]: ../../contributors
[link-symfony-recipe]: https://github.com/symfony/recipes-contrib/tree/master/tg-bot-api/bot-api-base/1.0
[link-php-7-2]: https://www.php.net/releases/7_2_0.php
[sonar-path]: https://sonarcloud.io/dashboard?id=tg-bot-api_bot-api-base
