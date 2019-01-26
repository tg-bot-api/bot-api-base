<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use TgBotApi\BotApiBase\Type\InputFileType;

/**
 * Class InputFileNormalizer.
 */
class InputFileNormalizer implements NormalizerInterface
{
    /**
     * @var
     */
    private $files;

    /**
     * InputFileNormalizer constructor.
     *
     * @param $files
     */
    public function __construct(&$files)
    {
        $this->files = &$files;
    }

    /**
     * @param mixed $topic
     * @param null  $format
     * @param array $context
     *
     * @return array|bool|float|int|string
     */
    public function normalize($topic, $format = null, array $context = [])
    {
        $uniqid = \uniqid('', true);

        $this->files[$uniqid] = $topic;

        return 'attach://' . $uniqid;
    }

    /**
     * @param mixed $data
     * @param null  $format
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof InputFileType;
    }
}
