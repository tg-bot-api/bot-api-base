# Changelog

All notable changes to `telegram-bot-api` will be documented in this file.

<!--- 
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
--->

## 1.7.0 - 2020-12-12
#### Bot API 5.0 - november November 4, 2020 

### Added
- #### Run Your Own Bot API Server Usage
    - You can pass url as 4th param in bot api
         ```php 
         $bot = new \TgBotApi\BotApiBase\BotApi('<bot key>', $apiClient, new \TgBotApi\BotApiBase\BotApiNormalizer(), '<your-domain>');
         ```
    - Added the method `logOut` (`LogOutMethod`), which can be used to log out from the cloud Bot API server before launching your bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive all updates.
    - Added the method `close` (`CloseMethod`), which can be used to close the bot instance before moving it from one local server to another.
    
- #### Webhooks
    - Added the parameter `ipAddress` to the class `SetWebhookMethod`, allowing to bypass DNS resolving and use the specified fixed IP address to send webhook requests.
    - Added the field `ipAddress` to the class `WebhookInfoType`, containing the current IP address used for webhook connections creation.
    - Added the ability to drop all pending updates when changing webhook URL using the parameter `dropPendingUpdates` to the class `SetWebhookMethod` and to `DeleteWebhookMethod`.

- #### Working with Groups
    - The `getChat` request now returns the identifier of the linked chat for supergroups and channels, i.e. the discussion group identifier for a channel and vice versa in the `linkedChatId` property.
    - The `getChat` request now returns the location to which the supergroup is connected (see `ChatType::$location`). Added the class `ChatLocationType` to represent the location.
    - Added the parameter `onlyIfBanned` to the class `UnbanChatMemberMethod` to allow safe unban.

- #### Working with Files
    - Added the property `fileName` to the classes `AudioType` and `VideoType`, containing the name of the original file.
    -  Added the ability to disable server-side file content type detection using the property `disableContentTypeDetection` in the `SendDocumentMethod` and the class inputMediaDocument.

- #### Multiple Pinned Messages
    - Added the parameter `messageId` to the `UnpinChatMessageMethod` to allow unpinning of the specific pinned message.
    - Added the method `UnpinAllChatMessagesMethod`, which can be used to unpin all pinned messages in a chat.

- #### File Albums
    - Added support for sending and receiving audio and document albums in the `SendMediaGroupMethod`. 

- #### Live Locations
    - Added the field `livePeriod` to the class `LocationType`, representing a maximum period for which the live location can be updated.
    - Added support for live location heading: added the field `heading` to the classes `LocationType`, `InlineQueryResultLocationType`, `InputLocationMessageContentType`, `SendLocationMethod` and `EditMessageLiveLocationMethod`.
    - Added support for proximity alerts in live locations: added the field `proximityAlertRadius` to the classes `LocationType`, `InlineQueryResultLocationType`, `InputLocationMessageContentType`, `SendLocationMethod` and `EditMessageLiveLocationMethod`.
    - Added the type `ProximityAlertTriggered` and the field `proximityAlertTriggered` to the class Message.
    - Added possibility to specify the horizontal accuracy of a location. Added the field `horizontalAccuracy` to the classes `LocationType`, `InlineQueryResultLocationType`, `InputLocationMessageContentType`, `SendLocationMethod` and `EditMessageLiveLocationMethod`.

- #### Anonymous Admins
    - Added the field `senderChat` to the class `MessageType`, containing the sender of a message which is a chat (group or channel). For backward compatibility in non-channel chats, the field from in such messages will contain the user 777000 for messages automatically forwarded to the discussion group and the user 1087968824 (@GroupAnonymousBot) for messages from anonymous group administrators.
    - Added the field `isAnonymous` to the class `ChatMemberType`, which can be used to distinguish anonymous chat administrators.
    - Added the parameter `isAnonymous` to the `PromoteChatMemberMethod`, which allows to promote anonymous chat administrators. The bot itself should have the `isAnonymous` right to do this. Despite the fact that bots can have the `isAnonymous` right, they will never appear as anonymous in the chat. Bots can use the right only for passing to other administrators.
    - Added the custom title of an anonymous message sender to the class `MessageType` as `authorSignature`.

- #### And More
    - Added the method `BotApi::copyMessage` and `CopyMessageMethod`, which sends a copy of any message.
    - Maximum poll question length increased to 300.
    - Added the ability to manually specify text entities (property `entities` or `captionEntities`) instead of specifying the `parseMode` in the classes 
        - `InputMediaPhotoType`
        - `InputMediaVideoType` 
        - `InputMediaAnimationType`
        - `InputMediaAudioType`
        - `InputMediaDocumentType`
        - `InlineQueryResultPhotoType`
        - `InlineQueryResultGifType`
        - `InlineQueryResultMpeg4GifType`
        - `InlineQueryResultVideoType` 
        - `InlineQueryResultAudioType` 
        - `InlineQueryResultVoiceType` 
        - `InlineQueryResultDocumentType` 
        - `InlineQueryResultCachedPhotoType` 
        - `InlineQueryResultCachedGifType` 
        - `InlineQueryResultCachedMpeg4GifType` 
        - `InlineQueryResultCachedVideoType` 
        - `InlineQueryResultCachedAudioType` 
        - `InlineQueryResultCachedVoiceType`
        - `InlineQueryResultCachedDocumentType` 
        - `InputTextMessageContentType` 
        - `SendMessageMethod`
        - `SendPhotoMethod`
        - `SendVideoMethod`
        - `SendAnimationMethod` 
        - `SendAudioMethod`
        - `SendDocumentMethod` 
        - `SendVoiceMethod`
        - `SendPollMethod` 
        - `EditMessageTextMethod` 
        - `EditMessageCaptionMethod`
    - Added the fields `googlePlaceId` and `googlePlaceType` to the classes `VenueType`, `InlineQueryResultVenueType`, `InputVenueMessageContentType` and to the methods `SendVenueMethod` to support Google Places as a venue API provider.
    - Added the field `allowSendingWithoutReply` to allow sending messages not a as reply if the replied-to message has already been deleted to following classes:
        - `sendMessageMethod`
        - `sendPhotoMethod`
        - `sendVideoMethod`
        - `SendAnimationMethod`
        - `SendAudioMethod`
        - `SendDocumentMethod`
        - `SendStickerMethod`
        - `SendVideoNoteMethod`
        - `SendVoiceMethod`
        - `SendLocationMethod`
        - `SendVenueMethod`
        - `SendContactMethod`
        - `SendPollMethod`
        - `SendDiceMethod`
        - `SendInvoiceMethod`
        - `SendGameMethod`
        - `SendMediaGroupMethod`
    
- #### And Last but bot Least
    - Supported the new football and slot machine animations for the random dice. Choose between different animations (dice, darts, basketball, football, slot machine) by specifying the emoji parameter in the method sendDice.

## 1.6.2 - 2020-07-13

### Fixed
- fixed EditMessageMediaMethod normalization (#33).


## 1.6.1 - 2020-07-03

### Fixed
- fixed phpdocumentor/reflection-docblock version #33.

## 1.6.0 - 2020-06-06

#### June 4, 2020
#### Bot API 4.9

### Added
- Added the new field `viaBot` to the `MessageType` class. 
You can now know which bot was used to send a message.
- Supported video thumbnails for inline GIF and MPEG4 animations (Updated comments in classes).
- Supported the new basketball animation for the random dice. 
Choose between different animations (dice, darts, basketball)
by specifying the emoji parameter in the `SendDiceMethod`.
Added to the class new factory method `SendDiceMethod::createWithBasketball` 
and new constant `SendDiceMethod::EMOJI_BASKETBALL`.

## 1.5.1 - 2020-05-28

### Fixed
- fixed SendInvoiceMethod normalization #33.

## 1.5.0 - 2020-04-24

#### April 24, 2020
#### Bot API 4.8

### Added
- Supported explanations for
 [**Quizzes 2.0**](https://telegram.org/blog/400-million#better-quizzes). 
Add explanations by specifying the parameters 
explanation and `explanationParseMode` in the method `SendPollMethod`.
- Added the fields explanation and `explanationEntities` to the `PollType` class.
- Supported timed polls that automatically close at a certain date and time. 
Set up by specifying the parameter `openPeriod` or `closeDate` in the `SendPollMethod`.
- Added the fields `openPeriod` and `closeDate` to the `PollType` class.
- Supported the new darts animation for the dice mini-game. 
Choose between the default dice animation and darts animation 
by specifying the parameter `emoji` in the `SendDiceMethod`. 
Added two factory methods `createWithDice` and `createWithDarts`  for `SendDiceMethod`.
- Added the field `emoji` to the `DiceType` class.

## 1.4.0 - 2020-03-31

#### March 30, 2020
#### Bot API 4.7

### Added
- Added the method `sendDice` `send(SendDiceMethod)` for sending a dice message, which will have a random value from 1 to 6. 
(Yes, we're aware of the “proper” singular of die. But it's awkward, and we decided to help it change One dice at a time!)
- Added the field `dice` to the `MessageType` object.
- Added the method `getMyCommands` for getting the current list of the bot's commands.
- Added the method `setMyCommands` `set(SetMyCommandMethod)` for changing the list of the bot's commands 
through the Bot API instead of @BotFather.
- Added the ability to create animated sticker sets by specifying the 
parameter `tgsSticker` instead of `pngSticker` in the class `CreateNewStickerSetMethod`.
- Added the ability to add animated stickers to sets created by the bot by specifying 
the parameter `tgsSticker` instead of `pngSticker` in the class `AddStickerToSetMethod`.
- Added the field `thumb` to the `StickerSetType` object.
- Added the ability to change thumbnails of sticker sets created by the bot 
using the method `setStickerSetThumb` `set(SetStickerSetThumbMethod)`.

### Deprecated
- `AddStickerToSetMethod::create()` - please use `createStatic` or `createAnimated` methods
- `CreateNewStickerSetMethod::create()` - please use `createStatic` or `createAnimated` methods

## 1.3.3 - 2020-03-06

### Fixed
- fixed Poll field in MessageType. bug #24.

## 1.3.2 - 2020-02-26

### Fixed
- fixed Poll normalization bug #21.

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
