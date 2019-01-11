<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Exception\BadArgumentException;
use TgBotApi\BotApiBase\Method\SetPassportDataErrorsMethod;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorDataFieldType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorFilesType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorFileType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorFrontSideType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorReverseSideType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorSelfieType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorTranslationFilesType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorTranslationFileType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorType;
use TgBotApi\BotApiBase\Type\PassportElementError\PassportElementErrorUnspecifiedType;

class SetPassportDataErrorsMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorDataField()
    {
        $this->runWithArguments(
            [
                'type' => 'personal_details',
                'message' => 'message',
                'field_name' => 'fieldName',
                'data_hash' => 'hash',
                'source' => 'data',
            ],
            PassportElementErrorDataFieldType::create(
                PassportElementErrorDataFieldType::TYPE_PERSONAL_DETAILS,
                'message',
                'fieldName',
                'hash'
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorFilesType()
    {
        $this->runWithArguments(
            [
                'type' => 'utility_bill',
                'message' => 'message',
                'file_hashes' => ['hash1', 'hash2'],
                'source' => 'files',
            ],
            PassportElementErrorFilesType::create(
                PassportElementErrorFilesType::TYPE_UTILITY_BILL,
                'message',
                ['hash1', 'hash2']
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorFileType()
    {
        $this->runWithArguments(
            [
                'type' => 'utility_bill',
                'message' => 'message',
                'file_hash' => 'hash1',
                'source' => 'file',
            ],
            PassportElementErrorFileType::create(
                PassportElementErrorFileType::TYPE_UTILITY_BILL,
                'message',
                'hash1'
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorFrontSideType()
    {
        $this->runWithArguments(
            [
                'type' => 'internal_passport',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'front_side',
            ],
            PassportElementErrorFrontSideType::create(
                PassportElementErrorFrontSideType::TYPE_INTERNAL_PASSPORT,
                'message',
                'hash'
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorReverseSideType()
    {
        $this->runWithArguments(
            [
                'type' => 'identity_card',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'reverse_side',
            ],
            PassportElementErrorReverseSideType::create(
                PassportElementErrorReverseSideType::TYPE_IDENTITY_CARD,
                'message',
                'hash'
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorSelfieType()
    {
        $this->runWithArguments(
            [
                'type' => 'passport',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'selfie',
            ],
            PassportElementErrorSelfieType::create(
                PassportElementErrorSelfieType::TYPE_PASSPORT,
                'message',
                'hash'
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorTranslationFilesType()
    {
        $this->runWithArguments(
            [
                'type' => 'utility_bill',
                'message' => 'message',
                'file_hashes' => ['hash1', 'hash2'],
                'source' => 'translation_files',
            ],
            PassportElementErrorTranslationFilesType::create(
                PassportElementErrorTranslationFilesType::TYPE_UTILITY_BILL,
                'message',
                ['hash1', 'hash2']
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorTranslationFileType()
    {
        $this->runWithArguments(
            [
                'type' => 'passport',
                'message' => 'message',
                'file_hash' => 'hash',
                'source' => 'translation_file',
            ],
            PassportElementErrorTranslationFileType::create(
                PassportElementErrorTranslationFileType::TYPE_PASSPORT,
                'message',
                'hash'
            )
        );
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testErrorUnspecifiedType()
    {
        $this->runWithArguments(
            [
                'type' => 'internal_passport',
                'message' => 'message',
                'element_hash' => 'hash',
                'source' => 'unspecified',
            ],
            PassportElementErrorUnspecifiedType::create(
                PassportElementErrorUnspecifiedType::TYPE_INTERNAL_PASSPORT,
                'message',
                'hash'
            )
        );
    }

    public function testElementErrorType()
    {
        $this->expectException(BadArgumentException::class);
        PassportElementErrorTranslationFileType::create(
            'wrong_type',
            'message',
            'hash'
        );
    }

    /**
     * @param array                    $excepted
     * @param PassportElementErrorType $errorType
     *
     * @throws \TgBotApi\BotApiBase\Exception\NormalizationException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function runWithArguments(array $excepted, PassportElementErrorType $errorType)
    {
        $botApi = $this->getBot(
            'setPassportDataErrors',
            [
                'user_id' => 1,
                'errors' => [
                    $excepted,
                ],
            ],
            true
        );

        $botApi->setPassportDataErrors(SetPassportDataErrorsMethod::create(
            1,
            [
                $errorType,
            ]
        ));
    }
}
