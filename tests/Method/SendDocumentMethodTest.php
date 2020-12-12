<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MessageEntityType;

class SendDocumentMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    public function testCreate(): void
    {
        $document = SendDocumentMethod::create(
            'chat_id',
            InputFileType::create('/dev/null'),
            [
                'thumb' => InputFileType::create('/dev/null'),
                'caption' => 'caption',
                'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN_V2,
                'disableNotification' => true,
                'replyToMessageId' => 1,
                'replyMarkup' => static::buildInlineMarkupObject(),
                'disableContentTypeDetection' => true,
            ]
        );

        static::assertEquals('chat_id', $document->chatId);
        static::assertEquals(InputFileType::create('/dev/null'), $document->document);
        static::assertEquals(InputFileType::create('/dev/null'), $document->thumb);
        static::assertEquals('caption', $document->caption);
        static::assertEquals('MarkdownV2', $document->parseMode);
        static::assertTrue($document->disableNotification);
        static::assertEquals(1, $document->replyToMessageId);
        static::assertEquals(static::buildInlineMarkupObject(), $document->replyMarkup);
        static::assertTrue($document->disableContentTypeDetection);
    }

    /**
     * @dataProvider provideData
     *
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode(SendDocumentMethod $method, array $request): void
    {
        $this->getApi($request)->sendDocument($method);
        $this->getApi($request)->send($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function provideData(): array
    {
        return [
            'default case' => [
                SendDocumentMethod::create(
                    'chat_id',
                    InputFileType::create('/dev/null'),
                    [
                        'thumb' => InputFileType::create('/dev/null'),
                        'caption' => 'caption',
                        'captionEntities' => [MessageEntityType::create(MessageEntityType::TYPE_PRE, 0, 1)],
                        'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'allowSendingWithoutReply' => true,
                        'replyMarkup' => static::buildInlineMarkupObject(),
                    ]
                ),
                [
                    'chat_id' => 'chat_id',
                    'document' => '',
                    'thumb' => '',
                    'caption' => 'caption',
                    'caption_entities' => [['type' => 'pre', 'offset' => 0, 'length' => 1]],
                    'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disable_notification' => true,
                    'reply_to_message_id' => 1,
                    'allow_sending_without_reply' => true,
                    'reply_markup' => static::buildInlineMarkupArray(),
                ],
            ],
            'Disable Content Type Detection case' => [
                SendDocumentMethod::create(
                    'chat_id',
                    InputFileType::create('/dev/null'),
                    [
                        'thumb' => InputFileType::create('/dev/null'),

                        'caption' => 'caption',
                        'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,

                        'disableNotification' => true,
                        'replyToMessageId' => 1,
                        'replyMarkup' => static::buildInlineMarkupObject(),
                        'disableContentTypeDetection' => true,
                    ]
                ),
                [
                    'chat_id' => 'chat_id',
                    'document' => '',
                    'thumb' => '',

                    'caption' => 'caption',
                    'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,

                    'disable_notification' => true,
                    'reply_to_message_id' => 1,
                    'reply_markup' => static::buildInlineMarkupArray(),
                    'disable_content_type_detection' => true,
                ],
            ],
        ];
    }

    private function getApi(array $request): BotApiComplete
    {
        return $this->getBotWithFiles(
            'sendDocument',
            $request,
            ['document' => true, 'thumb' => true],
            ['reply_markup']
        );
    }
}
