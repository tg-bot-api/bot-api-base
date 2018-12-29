<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type\InlineQueryResult;

use Greenplugin\TelegramBot\Method\Traits\FillFromArrayTrait;
use Greenplugin\TelegramBot\Type\InputMessageContent\InputMessageContentType;

/**
 * Class InlineQueryResultLocationType.
 *
 * Represents a location on a map. By default, the location will be sent by the user.
 * Alternatively, you can use input_message_content to send a message
 * with the specified content instead of the location.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
class InlineQueryResultLocationType extends InlineQueryResultType
{
    use FillFromArrayTrait;

    /**
     * Location latitude in degrees.
     *
     * @var float
     */
    public $latitude;

    /**
     * Location longitude in degrees.
     *
     * @var float
     */
    public $longitude;

    /**
     * Location title.
     *
     * @var string
     */
    public $title;

    /**
     * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
     *
     * @var int|null
     */
    public $livePeriod;

    /**
     * Optional. Content of the message to be sent instead of the location.
     *
     * @var InputMessageContentType|null
     */
    public $inputMessageContent;

    /**
     * Optional. Url of the thumbnail for the result.
     *
     * @var string|null
     */
    public $thumbUrl;

    /**
     * Optional. Thumbnail width.
     *
     * @var int|null
     */
    public $thumbWidth;

    /**
     * Optional. Thumbnail height.
     *
     * @var int|null
     */
    public $thumbHeight;

    /**
     * InlineQueryResultLocationType constructor.
     *
     * @param string     $id
     * @param float      $latitude
     * @param float      $longitude
     * @param string     $title
     * @param array|null $data
     *
     * @throws \Greenplugin\TelegramBot\Exception\BadArgumentException
     */
    public function __construct(string $id, float $latitude, float $longitude, string $title, array $data = null)
    {
        $this->type = self::TYPE_LOCATION;
        $this->id = $id;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->title = $title;
        if ($data) {
            $this->fill($data);
        }
    }
}
