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

## 1.1.0 - 2019-08-05
implemented support of [July update](https://core.telegram.org/bots/api#july-29-2019) of api 

### Added
- ChatPermissionsType 
- SetChatPermissionsMethod
- $chatPermissions field to ChatType
- $canSendPolls field to ChatMemberType
- $chatPermissions field to RestrictChatMemberMethod
- $isAnimated field to StickerSetType
- $isAnimated field to StickerType

### Deprecated
- $allMembersAreAdministrators in ChatType
- some fields in RestrictChatMemberMethod
    + $canAddWebPagePreviews
    + $canSendOtherMessages
    + $canSendMediaMessages
    + $canSendMessages
- createOld() method in RestrictChatMemberMethod

## 1.0.2 - 2019-06-01
Implemented support for Telegram Bot API v4.2
### Added
- #### types
   - added LoginUrlType

## 1.0.1 - 2019-04-05

### Fixed
- Type bugs in Update methods.
- Param must be of the type string, integer given, called in ApiClient.

## 1.0.0 - 2019-05-01

### Added
- updated api docs
- upgraded package version to 1.0 


## 0.4.0-beta - 2019-04-15
Implemented support for Telegram Bot API v4.2

### Added
- #### methods
   - added method sendPollMethod(SendPollMethod): MessageType to BotApiComplete 
   - allowed type SendPollMethod in send method of BotApi
   - added method stopPoll(StopPollMethod): Poll to BotApi
- #### types
   - added PollOptionType and PollType
   - added property $poll of PollType type to UpdateType class
   - added property $forwardSenderName of string type to MessageType class

### Fixed
- `bugfix` renamed property $signature to $forwardSignature 

## 0.2.0-beta - 2019-01-15

Added webhook fetcher.

Method `fetch()` of WebhookFetcher handling Psr\Http\Message\RequestInterface or string and always returns instance of UpdateType or throwing BadRequestException.
```php
$fetcher = new \TgBotApi\BotApiBase\WebhookFetcher(new \TgBotApi\BotApiBase\BotApiNormalizer());
$update = $fetcher->fetch($request);
```

## 0.1.0-beta - 2019-01-11

Implemented all methods and types referenced by [official Api](https://core.telegram.org/bots/api)
