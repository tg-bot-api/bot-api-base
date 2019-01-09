<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use TgBotApi\BotApiBase\Exception\NormalizationException;
use TgBotApi\BotApiBase\Exception\ResponseException;
use TgBotApi\BotApiBase\Method\AddStickerToSetMethod;
use TgBotApi\BotApiBase\Method\AnswerCallbackQueryMethod;
use TgBotApi\BotApiBase\Method\AnswerInlineQueryMethod;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;
use TgBotApi\BotApiBase\Method\GetChatMemberMethod;
use TgBotApi\BotApiBase\Method\GetChatMembersCountMethod;
use TgBotApi\BotApiBase\Method\GetChatMethod;
use TgBotApi\BotApiBase\Method\GetFileMethod;
use TgBotApi\BotApiBase\Method\GetMeMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
use TgBotApi\BotApiBase\Method\GetWebhookInfoMethod;
use TgBotApi\BotApiBase\Method\Interfaces\SendMessageInterface;
use TgBotApi\BotApiBase\Method\KickChatMemberMethod;
use TgBotApi\BotApiBase\Method\LeaveChatMethod;
use TgBotApi\BotApiBase\Method\PinChatMessageMethod;
use TgBotApi\BotApiBase\Method\PromoteChatMemberMethod;
use TgBotApi\BotApiBase\Method\RestrictChatMemberMethod;
use TgBotApi\BotApiBase\Method\SendAnimationMethod;
use TgBotApi\BotApiBase\Method\SendAudioMethod;
use TgBotApi\BotApiBase\Method\SendChatActionMethod;
use TgBotApi\BotApiBase\Method\SendContactMethod;
use TgBotApi\BotApiBase\Method\SendDocumentMethod;
use TgBotApi\BotApiBase\Method\SendGameMethod;
use TgBotApi\BotApiBase\Method\SendInvoiceMethod;
use TgBotApi\BotApiBase\Method\SendLocationMethod;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Method\SendMessageMethod;
use TgBotApi\BotApiBase\Method\SendPhotoMethod;
use TgBotApi\BotApiBase\Method\SendStickerMethod;
use TgBotApi\BotApiBase\Method\SendVenueMethod;
use TgBotApi\BotApiBase\Method\SendVideoMethod;
use TgBotApi\BotApiBase\Method\SendVideoNoteMethod;
use TgBotApi\BotApiBase\Method\SendVoiceMethod;
use TgBotApi\BotApiBase\Method\SetChatDescriptionMethod;
use TgBotApi\BotApiBase\Method\SetChatPhotoMethod;
use TgBotApi\BotApiBase\Method\SetChatStickerSetMethod;
use TgBotApi\BotApiBase\Method\SetChatTitleMethod;
use TgBotApi\BotApiBase\Method\SetGameScoreMethod;
use TgBotApi\BotApiBase\Method\SetStickerPositionInSetMethod;
use TgBotApi\BotApiBase\Method\SetWebhookMethod;
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
use TgBotApi\BotApiBase\Type\WebhookInfoType;

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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
     *
     * @return MessageType[]
     */
    public function sendMediaGroup(SendMediaGroupMethod $method): array
    {
        return $this->call($method, MessageType::class . '[]');
    }

    /**
     * @param SendChatActionMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function sendChatAction(SendChatActionMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SendGameMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendGame(SendGameMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendInvoiceMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendInvoice(SendInvoiceMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendLocationMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendContact(SendContactMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param SendMessageInterface $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function send(SendMessageInterface $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param GetUserProfilePhotosMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return UserProfilePhotosType
     */
    public function getUserProfilePhotos(GetUserProfilePhotosMethod $method): UserProfilePhotosType
    {
        return $this->call($method, UserProfilePhotosType::class);
    }

    /**
     * @param GetWebhookInfoMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return WebhookInfoType
     */
    public function getWebhookInfo(GetWebhookInfoMethod $method): WebhookInfoType
    {
        return $this->call($method, WebhookInfoType::class);
    }

    /**
     * @param LeaveChatMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function leaveChat(LeaveChatMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param PinChatMessageMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function pinChatMessage(PinChatMessageMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SendStickerMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return MessageType
     */
    public function sendSticker(SendStickerMethod $method): MessageType
    {
        return $this->call($method, MessageType::class);
    }

    /**
     * @param PromoteChatMemberMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function promoteChatMember(PromoteChatMemberMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param RestrictChatMemberMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function restrictChatMember(RestrictChatMemberMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param GetFileMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @throws NormalizationException
     *
     * @return bool
     */
    public function kickChatMember(KickChatMemberMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetChatDescriptionMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatDescription(SetChatDescriptionMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetChatPhotoMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatPhoto(SetChatPhotoMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetChatStickerSetMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatStickerSet(SetChatStickerSetMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetChatTitleMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setChatTitle(SetChatTitleMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetGameScoreMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setGameScore(SetGameScoreMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetStickerPositionInSetMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setStickerPositionInSet(SetStickerPositionInSetMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param SetWebhookMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function setWebhook(SetWebhookMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param AddStickerToSetMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return bool
     */
    public function addStickerToSet(AddStickerToSetMethod $method): bool
    {
        return $this->call($method);
    }

    /**
     * @param GetChatMembersCountMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
     *
     * @return int
     */
    public function getChatMembersCount(GetChatMembersCountMethod $method): int
    {
        return $this->call($method);
    }

    /**
     * @param AnswerCallbackQueryMethod $method
     *
     * @throws ResponseException
     * @throws NormalizationException
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
     * @throws NormalizationException
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
     * @return object|array
     */
    private function denormalize($data, $type)
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
     * @throws NormalizationException
     *
     * @return array []
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

        if (!\is_array($data)) {
            throw new NormalizationException('Normalized data must be array');
        }

        return [$data, $files];
    }
}
