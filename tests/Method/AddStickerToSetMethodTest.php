<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Tests\Method;

use Greenplugin\TelegramBot\Method\AddStickerToSetMethod;
use Greenplugin\TelegramBot\Type\InputFileType;
use Greenplugin\TelegramBot\Type\MaskPositionType;

class AddStickerToSetMethodTest extends MethodTestCase
{
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
            InputFileType::create(new \SplFileInfo('/dev/null')),
            '😀',
            [
                'maskPosition' => MaskPositionType::create(MaskPositionType::MASK_POINT_FOREHEAD, 1, 1, 1),
            ]
        ));
    }
}
