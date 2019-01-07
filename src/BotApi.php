<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\AddStickerToSetMethod;
use TgBotApi\BotApiBase\Method\AnswerCallbackQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;
use TgBotApi\BotApiBase\Method\GetChatMemberMethod;
use TgBotApi\BotApiBase\Method\GetChatMethod;
use TgBotApi\BotApiBase\Method\GetFileMethod;
use TgBotApi\BotApiBase\Method\GetMeMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
use TgBotApi\BotApiBase\Method\KickChatMemberMethod;
use TgBotApi\BotApiBase\Method\SendAnimationMethod;
use TgBotApi\BotApiBase\Method\SendAudioMethod;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Method\SendLocationMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Method\SendVenueMethod;
use TgBotApi\BotApiBase\Method\SendVideoMethod;
use TgBotApi\BotApiBase\Method\SendVideoNoteMethod;
use TgBotApi\BotApiBase\Method\SendVoiceMethod;
use TgBotApi\BotApiBase\Normalizer\AnswerInlineQueryNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputFileNormalizer;
use TgBotApi\BotApiBase\Normalizer\InputMediaNormalizer;
use TgBotApi\BotApiBase\Normalizer\JsonSerializableNormalizer;
use TgBotApi\BotApiBase\Normalizer\MediaGroupNormalizer;
use TgBotApi\BotApiBase\Normalizer\UserProfilePhotosNormalizer;
use TgBotApi\BotApiBase\Type\ChatMemberType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;
use TgBotApi\BotApiBase\Type\UserType;

/**
 * Class BotApi.
 */
class BotApi implements BotApiInterface
{
    /**
     * @var string
     */
    private $botKey;

    /**
     * @var ApiClientInterface
     */
    private $apiClient;

    /**
     * @var string
     */
    private $endPoint;

    /**
     * BotApi constructor.
     *
     * @param string             $botKey
     * @param ApiClientInterface $apiClient
     * @param string             $endPoint
     */
    public function __construct(
        string $botKey,
        ApiClientInterface $apiClient,
        string $endPoint = 'https://api.telegram.org'
    ) {
        $this->botKey = $botKey;
        $this->apiClient = $apiClient;
        $this->endPoint = $endPoint;

        $this->apiClient->setBotKey($botKey);
        $this->apiClient->setEndpoint($endPoint);
    }

    /**
     * @param $method
     * @param $type
     *
     * @throws ResponseException
     *
     * @return mixed
     */
    public function call($method, $type = null)
    {
        list($data, $files) = $this->encode($method);

        $json = $this->apiClient->send($this->getMethodName($method), $data, $files);

        if (true !== $json->ok) {
            throw new ResponseException($json->description);
        }

        return $type ? $this->denormalize($json, $type) : $json->result;
    }

    /**
     * @param GetUpdatesMethod $method
     *
     * @throws ResponseException
     *
     * @return UpdateType[]
     */
    public function getUpdates(GetUpdatesMethod $method): array
    {
        return $this->call($method, UpdateType::class . '[]');
    }

    /**
     * @param GetMeMethod $method
     *
     * @throws ResponseException
     *
     * @return UserType
     */
    public function getMe(GetMeMethod $method): UserType
    {
        return $this->call($method, UserType::class);
    }

    /**
     * @param SendMessageMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendMessage(SendMessageMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param ForwardMessageMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendForwardMessage(ForwardMessageMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendPhotoMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendPhoto(SendPhotoMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendAudioMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendAudio(SendAudioMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendDocumentMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendDocument(SendDocumentMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVideoMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendVideo(SendVideoMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendAnimationMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendAnimation(SendAnimationMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVoiceMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendVoice(SendVoiceMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVideoNoteMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendVideoNote(SendVideoNoteMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendMediaGroupMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType[]
     */
    public function sendMediaGroup(SendMediaGroupMethod $method): array
    {
        return $this->call($method, MessageType::class . '[]');
    }

    /**
     * @param SendLocationMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendLocation(SendLocationMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVenueMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendVenue(SendVenueMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendContactMethod $method
     *
     * @throws ResponseException
     *
     * @return MessageType
     */
    public function sendContact(SendContactMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param GetUserProfilePhotosMethod $method
     *
     * @throws ResponseException
     *
     * @return UserProfilePhotosType
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $method): UserProfilePhotosType
    {
        return $this->call($method, UserProfilePhotosType::class);
    }

    /**
     * @todo fix this is bad
     *
     * @param GetFileMethod $method
     *
     * @throws ResponseException
     *
     * @return FileType
     */
    public function getFile(GetFileMethod $method): FileType
    {
        return $this->call($method, FileType::class);
    }

    /**
     * @param FileType $file
     *
     * @return string
     */
    public function getAbsoluteFilePath(FileType $file): string
    {
        return \sprintf('%s/file/bot%s/%s', $this->endPoint, $this->botKey, $file->filePath);
    }

    /**
     * @param GetChatMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatType
     */
    public function getChat(GetChatMethod $method): ChatType
    {
        return $this->call($method, ChatType::class);
    }

    /**
     * @param GetChatAdministratorsMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatMemberType[]
     */
    public function getChatAdministrators(GetChatAdministratorsMethod $method): array
    {
        return $this->call($method, ChatMemberType::class . '[]');
    }

    /**
     * @param GetChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return ChatMemberType
     */
    public function getChatMember(GetChatMemberMethod $method): ChatMemberType
    {
        return $this->call($method, ChatMemberType::class);
    }

    /**
     * @param KickChatMemberMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function kickChatMember(KickChatMemberMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param AddStickerToSetMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function addStickerToSet(AddStickerToSetMethod $method): bool
    {
        return $this->call($method);
    }

//    public function answerInlineQuery(AnswerInlineQueryMethod $method)
//    {
//        return $this->call($method, '');
//    }

    /**
     * @param AnswerCallbackQueryMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerCallbackQuery(AnswerCallbackQueryMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param AnswerInlineQueryMethod $method
     *
     * @throws ResponseException
     *
     * @return bool
     */
    public function answerInlineQuery(AnswerInlineQueryMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param $method
     *
     * @return string
     */
    private function getMethodName($method): string
    {
        return \lcfirst(\substr(
            \get_class($method),
            \strrpos(\get_class($method), '\\') + 1,
            -1 * \strlen('Method')
        ));
    }

    /**
     * @param $data
     * @param $type
     *
     * @return object
     */
    private function denormalize($data, $type): object
    {
        $normalizer = new ObjectNormalizer(
            null,
            new CamelCaseToSnakeCaseNameConverter(),
            null,
            new PhpDocExtractor()
        );
        $arrayNormalizer = new ArrayDenormalizer();
        $serializer = new Serializer([
            new UserProfilePhotosNormalizer($normalizer, $arrayNormalizer),
            new DateTimeNormalizer(),
            $normalizer,
            $arrayNormalizer,
        ]);

        return $serializer->denormalize($data->result, $type, null, [DateTimeNormalizer::FORMAT_KEY => 'U']);
    }

    /**
     * @param $method
     *
     * @return array
     */
    private function encode($method): array
    {
        $files = [];

        $objectNormalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer([
            new InputFileNormalizer($files),
            new MediaGroupNormalizer(new InputMediaNormalizer($objectNormalizer, $files), $objectNormalizer),
            new JsonSerializableNormalizer($objectNormalizer),
            new AnswerInlineQueryNormalizer($objectNormalizer),
            new DateTimeNormalizer(),
            $objectNormalizer,
        ]);

        $data = $serializer->normalize(
            $method,
            null,
            ['skip_null_values' => true, DateTimeNormalizer::FORMAT_KEY => 'U']
        );

        return [$data, $files];
    }
}
