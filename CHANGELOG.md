# Changelog

All notable changes to `telegram-bot-api` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

<!--- 
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
--->

## 1.3.1 - 2020-01-30

### Fixed
- fixed stdObject property call inUserProfilePhotosNormalizer, updated test for it.

## 1.3.0 - 2020-01-25

### Added
- Added support Bot API 4.6  (January 23, 2020)
    - Supported Polls 2.0.
    -  Added the ability to send non-anonymous, multiple answer, and quiz-style polls: added the parameters 
    `isAnonymous`, `type`, `allowsMultipleAnswers`, `correctOptionId`, 
    `isClosed` options to the `SendPollMethod` class.
    -  Added the class `Poll\KeyboardButtonPollType` and the field `requestPoll` to the `KeyboardButtonType` class.
    -  Added `PollAnswerType` class 
    -  Added updates about changes of user answers in non-anonymous polls, represented by the `PollAnswerType` class 
    and the field `pollAnswer` in the `UpdateType` class.
    -  Added the fields `totalVoterCount`, `isAnonymous`, `type`, `allowsMultipleAnswers`, 
    `correctOptionId` to the Poll object.
    -  Bots can now send polls to private chats.
    -  Added more information about the bot in response to the `getMe` request: 
    added the fields `canJoinGroups`, `canReadAllGroupMessages` and `supportsInlineQueries` to the `UserType` class.
    -  Added the optional field `language` to the `MessageEntityType` class.

## 1.2.0 - 2020-01-23

### Added
- Added support Bot API 4.5  (December 31, 2019)
    - Added support for two new `MessageEntityType` types, underline and strikethrough.
    - Added support for nested `MessageEntityType` objects. Entities can now contain other entities. 
    If two entities have common characters then one of them is fully contained inside the other.
    - Added support for nested entities and the new tags 
    `<u>/<ins> `(for underlined text) and `<s>/<strike>/<del>` (for strikethrough text) in parse mode HTML.
    - Added a new parse mode, MarkdownV2, which supports nested entities 
    and two new entities (for underlined text) and (for strikethrough text). 
    Added a new parse mode, `MarkdownV2`, which supports nested entities and two new entities 
    `__` (for underlined text) and `~` (for strikethrough text). 
    Parse mode Markdown remains unchanged for backward compatibility.
    - Added the field `fileUniqueId` to the objects `AnimationType`, `AudioType`, `DocumentType`, 
    `PassportFileType`, `PhotoSizeType`, `StickerType`, `VideoType`, `VideoNoteType`, `VoiceType`, 
    File and the fields `smallFileUniqueId` and `bigFileUniqueId` to the object ChatPhoto. 
    The new fields contain a unique file identifier, which is supposed to be the same over time and for different bots, 
    but can't be used to download or reuse the file.
    - Added the field customTitle to the `ChatMemberType` object.
    - Added the new method `SetChatAdministratorCustomTitleMethod` to manage the custom titles of administrators promoted by the bot.
    - Added the field `slowModeDelay` to the Chat object.

## 1.1.4 - 2020-01-19

### Fixed
- Fixed broken field ChatType::username thanks for [Jan Dittrich](https://github.com/jan-di)
- Fixed constant visibility in ChatType class

## 1.1.1, 1.1.2, 1.1.3 - 2020-01-19

### Added
- Support symfony 3.4

### Fixed
- minor bug fixes

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
