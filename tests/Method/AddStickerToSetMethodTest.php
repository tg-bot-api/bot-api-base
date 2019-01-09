<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\AddStickerToSetMethod;
use TgBotApi\BotApiBase\Type\InputFileType;
use TgBotApi\BotApiBase\Type\MaskPositionType;

class AddStickerToSetMethodTest extends MethodTestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBotWithFiles(
            'addStickerToSet',
            [
                'user_id' => 1,
                'name' => 'name',
                'png_sticker' => '',
                'emojis' => '😀',
                'mask_position' => ['point' => 'forehead', 'x_shift' => 1.0, 'y_shift' => 1.0, 'scale' => 1],
            ],
            ['png_sticker' => true],
            ['mask_position'],
            true
        );

        $botApi->addStickerToSet(AddStickerToSetMethod::create(
            1,
            'name',
            InputFileType::create('/dev/null'),
            '😀',
            [
                'maskPosition' => MaskPositionType::create(MaskPositionType::MASK_POINT_FOREHEAD, 1, 1, 1),
            ]
        ));
    }
}
