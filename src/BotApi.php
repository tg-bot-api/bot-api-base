<?php

namespace Greenplugin\TelegramBot;

use Greenplugin\TelegramBot\Exception\ResponseException;
use Greenplugin\TelegramBot\Method\AnswerCallbackQueryMethod;
use Greenplugin\TelegramBot\Method\ForwardMessageMethod;
use Greenplugin\TelegramBot\Method\GetChatAdministratorsMethod;
use Greenplugin\TelegramBot\Method\GetChatMemberMethod;
use Greenplugin\TelegramBot\Method\GetChatMethod;
use Greenplugin\TelegramBot\Method\GetFileMethod;
use Greenplugin\TelegramBot\Method\GetMeMethod;
use Greenplugin\TelegramBot\Method\GetUpdatesMethod;
use Greenplugin\TelegramBot\Method\GetUserProfilePhotosMethod;
use Greenplugin\TelegramBot\Method\SendAnimationMethod;
use Greenplugin\TelegramBot\Method\SendAudioMethod;
use Greenplugin\TelegramBot\Method\SendContactMethod;
use Greenplugin\TelegramBot\Method\SendDocumentMethod;
use Greenplugin\TelegramBot\Method\SendLocationMethod;
use Greenplugin\TelegramBot\Method\SendMediaGroupMethod;
use Greenplugin\TelegramBot\Method\SendMessageMethod;
use Greenplugin\TelegramBot\Method\SendPhotoMethod;
use Greenplugin\TelegramBot\Method\SendVenueMethod;
use Greenplugin\TelegramBot\Method\SendVideoMethod;
use Greenplugin\TelegramBot\Method\SendVideoNoteMethod;
use Greenplugin\TelegramBot\Method\SendVoiceMethod;
use Greenplugin\TelegramBot\Type\ChatMemberType;
use Greenplugin\TelegramBot\Type\ChatType;
use Greenplugin\TelegramBot\Type\FileType;
use Greenplugin\TelegramBot\Type\MessageType;
use Greenplugin\TelegramBot\Type\UpdateType;
use Greenplugin\TelegramBot\Type\UserProfilePhotosType;
use Greenplugin\TelegramBot\Type\UserType;
use Nyholm\Psr7\Request;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BotApi implements BotApiInterface
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    private $key;

    private $endPoint;

    /**
     * Create a new Skeleton Instance
     * @param HttpClientInterface $httpClient
     * @param string $key
     * @param string $endPoint
     */
    public function __construct(HttpClientInterface $httpClient, string $key, string $endPoint = 'https://api.telegram.org/bot')
    {
        $this->httpClient = $httpClient;
        $this->key = $key;
        $this->endPoint = $endPoint;
    }

    /**
     * @param $method
     * @param $type
     * @return object
     * @throws ResponseException
     */
    public function call($method, $type)
    {
        $data = $this->encode($method);
        $json = $this->httpClient->post($this->endPoint . $this->key . '/' . $this->getMethodName($method),  $data);

        if ($json->ok !== true) {
            throw new ResponseException($json->description);
        }

        return $this->denormalize($json, $type);
    }

    private function getMethodName($method)
    {
        return lcfirst(substr(get_class($method),strrpos(get_class($method), '\\')+1, -1 * strlen('Method')));
    }

    private function denormalize($data, $type)
    {
        $callbacks = [];

        $normalizer = new ObjectNormalizer(
            null,
            new CamelCaseToSnakeCaseNameConverter(),
            null,
            new PhpDocExtractor(),
            null,
            null,
            [ObjectNormalizer::CALLBACKS =>$callbacks]);

        $serializer = new Serializer([$normalizer, new ArrayDenormalizer]);
        return $serializer->denormalize($data->result, $type);
    }

    private function encode($method)
    {
        $callbacks = [];
        $normalizer = new ObjectNormalizer(
            null,
            new CamelCaseToSnakeCaseNameConverter(),
            null,
            null,
            null,
            null,
            [ObjectNormalizer::CALLBACKS =>$callbacks]);

        $serializer = new Serializer([$normalizer]);

        return $serializer->normalize($method, null, ['skip_null_values' => true]);
    }

    /**
     * @param GetUpdatesMethod $method
     * @return UpdateType[]
     * @throws ResponseException
     */
    public function getUpdates(GetUpdatesMethod $method): array
    {
        return $this->call($method, UpdateType::class.'[]');
    }

    /**
     * @param GetMeMethod $method
     * @return UserType
     * @throws ResponseException
     */
    public function getMe(GetMeMethod $method): UserType
    {
        return $this->call($method, UserType::class);
    }

    /**
     * @param SendMessageMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendMessage(SendMessageMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param ForwardMessageMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendForwardMessage(ForwardMessageMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendPhotoMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendPhoto(SendPhotoMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendAudioMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendAudio(SendAudioMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendDocumentMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendDocument(SendDocumentMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVideoMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendVideo(SendVideoMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendAnimationMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendAnimation(SendAnimationMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVoiceMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendVoice(SendVoiceMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVideoNoteMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendVideoNote(SendVideoNoteMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendMediaGroupMethod $method
     * @return MessageType[]
     * @throws ResponseException
     */
    public function sendMediaGroup(SendMediaGroupMethod $method): array
    {
        return $this->call($method, MessageType::class.'[]');
    }

    /**
     * @param SendLocationMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendLocation(SendLocationMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendVenueMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendVenue(SendVenueMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendContactMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function sendContact(SendContactMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param GetUserProfilePhotosMethod $method
     * @return UserProfilePhotosType
     * @throws ResponseException
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $method): UserProfilePhotosType
    {
        return $this->call($method, UserProfilePhotosType::class);
    }

    /**
     * @param GetFileMethod $method
     * @return FileType
     * @throws ResponseException
     */
    public function getFile(GetFileMethod $method): FileType
    {
        return $this->call($method, FileType::class);
    }

    /**
     * @param GetChatMethod $method
     * @return ChatType
     * @throws ResponseException
     */
    public function getChat(GetChatMethod $method): ChatType
    {
        return $this->call($method, ChatType::class);
    }

    /**
     * @param GetChatAdministratorsMethod $method
     * @return ChatMemberType[]
     * @throws ResponseException
     */
    public function getChatAdministrators(GetChatAdministratorsMethod $method): array
    {
        return $this->call($method, ChatMemberType::class.'[]');
    }

    /**
     * @param GetChatMemberMethod $method
     * @return ChatMemberType[]
     * @throws ResponseException
     */
    public function getChatMember(GetChatMemberMethod $method): ChatMemberType
    {
        return $this->call($method, ChatMemberType::class);
    }

     /**
     * @param AnswerCallbackQueryMethod $method
     * @return MessageType
     * @throws ResponseException
     */
    public function answerCallbackQueryMethod(AnswerCallbackQueryMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

}
