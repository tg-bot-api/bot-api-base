<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;
use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InlineQueryResult\InlineQueryResultArticleType;
use TgBotApi\BotApiBase\Type\InlineQueryResult\InlineQueryResultAudioType;
use TgBotApi\BotApiBase\Type\InputMessageContent\InputTextMessageContentType;

/**
 * Class AnswerInlineQueryMethodTest.
 *
 * @todo add all InlineQueryTypes
 */
class AnswerInlineQueryMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testInlineQueryResultArticle()
    {
        list($exceptedMessageContent, $verifiableMessageContent) = $this->buildInputTextMessageContent();
        $this->runWithArguments(
            [
                'type' => 'article',
                'id' => 'id',
                'title' => 'title',
                'input_message_content' => $exceptedMessageContent,
                'reply_markup' => $this->buildInlineKeyboardButtonArray(),
                'url' => 'url',
                'hide_url' => true,
                'description' => 'description',
                'thumb_url' => 'thumb_url',
                'thumb_width' => 320,
                'thumb_height' => 320,
            ],
            InlineQueryResultArticleType::create(
                'id',
                'title',
                $verifiableMessageContent,
                [
                    'replyMarkup' => $this->buildInlineKeyboardButtonObject(),
                    'url' => 'url',
                    'hideUrl' => true,
                    'description' => 'description',
                    'thumbUrl' => 'thumb_url',
                    'thumbWidth' => 320,
                    'thumbHeight' => 320,
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testInlineQueryResultAudio()
    {
        list($exceptedMessageContent, $verifiableMessageContent) = $this->buildInputTextMessageContent();
        $this->runWithArguments(
            [
                'type' => 'audio',
                'id' => 'id',
                'audio_url' => 'audio_url',
                'title' => 'title',
                'caption' => 'caption',
                'parse_mode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                'performer' => 'performer',
                'audio_duration' => 1,
                'reply_markup' => $this->buildInlineKeyboardButtonArray(),
                'input_message_content' => $exceptedMessageContent,
            ],
            InlineQueryResultAudioType::create(
                'id',
                'audio_url',
                'title',
                [
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                    'performer' => 'performer',
                    'audioDuration' => 1,
                    'replyMarkup' => $this->buildInlineKeyboardButtonObject(),
                    'caption' => 'caption',
                    'inputMessageContent' => $verifiableMessageContent,
                ]
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     *
     * @return array
     */
    private function buildInputTextMessageContent(): array
    {
        return [
            [
                'message_text' => 'InputTextMessageContentType',
                'parse_mode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                'disable_web_page_preview' => true,
            ],
            InputTextMessageContentType::create(
                'InputTextMessageContentType',
                [
                    'parseMode' => InputTextMessageContentType::PARSE_MODE_MARKDOWN,
                    'disableWebPagePreview' => true,
                ]
            ),
        ];
    }

    /**
     * @param $excepted
     * @param $verifiable
     *
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \Exception
     */
    private function runWithArguments($excepted, $verifiable)
    {
        $dateTime = new \DateTimeImmutable();

        $botApi = $this->getBot('answerInlineQuery', [
            'inline_query_id' => 'inline_query_id',
            'results' => [
                $excepted,
                $excepted,
            ],
            'cache_time' => $dateTime->format('U'),
            'is_personal' => true,
            'next_offset' => 'next_offset',
            'switch_pm_text' => 'switch_pm_text',
            'switch_pm_parameter' => 'switch_pm_parameter',
        ], true, ['results']);

        $answer = AnswerInlineQueryMethod::create(
            'inline_query_id',
            [$verifiable],
            [
                'cacheTime' => $dateTime,
                'isPersonal' => true,
                'nextOffset' => 'next_offset',
                'switchPmText' => 'switch_pm_text',
                'switchPmParameter' => 'switch_pm_parameter',
            ]
        );

        $answer->addResult(
            $verifiable
        );

        $botApi->answerInlineQuery($answer);
    }
}
