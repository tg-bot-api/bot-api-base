<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\CreateNewStickerSetMethod;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MaskPositionType;

class CreateNewStickerSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testEncode()
    {
        $botApi = $this->getBotWithFiles(
            'createNewStickerSet',
            [
                'user_id' => 1,
                'name' => 'sticker_set_name',
                'title' => 'title',
                'png_sticker' => '',
                'emojis' => '😀',
                'contains_masks' => true,
                'mask_position' => ['point' => 'forehead', 'x_shift' => 1.0, 'y_shift' => 1.0, 'scale' => 1],
            ],
            ['png_sticker' => true],
            ['mask_position'],
            true
        );

        $botApi->createNewStickerSet(CreateNewStickerSetMethod::create(
            1,
            'sticker_set_name',
            'title',
            InputFileType::create('/dev/null'),
            '😀',
            [
                'containsMasks' => true,
                'maskPosition' => MaskPositionType::create(MaskPositionType::MASK_POINT_FOREHEAD, 1, 1, 1),
            ]
        ));
    }
}
