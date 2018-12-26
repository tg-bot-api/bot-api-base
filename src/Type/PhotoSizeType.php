<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

/**
 * Class PhotoSizeType.
 *
 * @see https://core.telegram.org/bots/api#photosize
 */
class PhotoSizeType
{
    use FillFromArrayTrait;
    /**
     * Unique identifier for this file.
     *
     * @var string
     */
    public $fileId;

    /**
     * Photo width.
     *
     * @var int
     */
    public $width;

    /**
     * Photo height.
     *
     * @var int
     */
    public $height;

    /**
     * Optional. File size.
     *
     * @var int|null
     */
    public $fileSize;

    /**
     * @todo fix collection denormalization.
     * UserProfilePhotosType constructor.
     *
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->fill($data, null, new CamelCaseToSnakeCaseNameConverter());
        }
    }
}
