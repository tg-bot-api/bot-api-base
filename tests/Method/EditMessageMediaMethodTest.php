<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\EditMessageMediaMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\ReplyKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAnimationType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaAudioType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaDocumentType;

class EditMessageMediaMethodTest extends MethodTestCase
{
    use ReplyKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $this->queryApi(
            [
                'chat_id' => 'chat_id',
                'message_id' => 1,
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaDocumentType',
                    'parse_mode' => 'Markdown',
                    'type' => 'document',
                    'thumb' => '',
                    'disable_content_type_detection' => true,
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageMediaMethod::create(
                'chat_id',
                1,
                InputMediaDocumentType::create(InputFileType::create('/dev/null'), [
                    'thumb' => InputFileType::create('/dev/null'),
                    'caption' => 'InputMediaDocumentType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'disableContentTypeDetection' => true,
                ]),
                [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeInline()
    {
        $this->queryApi(
            [
                'inline_message_id' => 'inline_message_id',
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaDocumentType',
                    'parse_mode' => 'Markdown',
                    'type' => 'document',
                    'thumb' => '',
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageMediaMethod::createInline(
                'inline_message_id',
                InputMediaDocumentType::create(InputFileType::create('/dev/null'), [
                    'thumb' => InputFileType::create('/dev/null'),
                    'caption' => 'InputMediaDocumentType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeMediaAudio()
    {
        $this->queryApi(
            [
                'inline_message_id' => 'inline_message_id',
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaAudioType',
                    'title' => 'title',
                    'parse_mode' => 'Markdown',
                    'duration' => 100,
                    'performer' => 'performer',
                    'type' => 'audio',
                    'thumb' => '',
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageMediaMethod::createInline(
                'inline_message_id',
                InputMediaAudioType::create(InputFileType::create('/dev/null'), [
                    'thumb' => InputFileType::create('/dev/null'),
                    'duration' => 100,
                    'performer' => 'performer',
                    'caption' => 'InputMediaAudioType',
                    'title' => 'title',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncodeMediaAnimation()
    {
        $this->queryApi(
            [
                'inline_message_id' => 'inline_message_id',
                'media' => [
                    'media' => '',
                    'caption' => 'InputMediaAnimationType',
                    'parse_mode' => 'Markdown',
                    'duration' => 100,
                    'width' => 320,
                    'height' => 320,
                    'type' => 'animation',
                    'thumb' => '',
                ],
                'reply_markup' => $this->buildReplyMarkupArray(),
            ],
            EditMessageMediaMethod::createInline(
                'inline_message_id',
                InputMediaAnimationType::create(InputFileType::create('/dev/null'), [
                    'thumb' => InputFileType::create('/dev/null'),
                    'duration' => 100,
                    'width' => 320,
                    'height' => 320,
                    'caption' => 'InputMediaAnimationType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                [
                    'replyMarkup' => $this->buildReplyMarkupObject(),
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    private function queryApi(array $excepted, EditMessageMediaMethod $actual)
    {
        $this->getBotWithFiles(
            'editMessageMedia',
            $excepted,
            ['media' => ['media' => true, 'thumb' => true]],
            ['media', 'reply_markup'],
            true
        )->editMessageMedia($actual);
    }
}
