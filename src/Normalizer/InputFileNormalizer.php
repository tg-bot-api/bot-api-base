<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Normalizer;

use Greenplugin\TelegramBot\Type\InputFileType;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InputFileNormalizer implements NormalizerInterface
{
    private $files;

    public function __construct(&$files)
    {
        $this->files = &$files;
    }

    public function normalize($topic, $format = null, array $context = [])
    {
        $uniqid = \uniqid();
        $this->files[$uniqid] = $topic->file;

        return 'attach://'.$uniqid;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof InputFileType;
    }
}
