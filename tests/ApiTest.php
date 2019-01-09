<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests;

use TgBotApi\BotApiBase\Helper\BotApiHelper;
use TgBotApi\BotApiBase\Method\ForwardMessageMethod;
use TgBotApi\BotApiBase\Method\GetChatAdministratorsMethod;
use TgBotApi\BotApiBase\Method\GetChatMemberMethod;
use TgBotApi\BotApiBase\Method\GetChatMethod;
use TgBotApi\BotApiBase\Method\GetFileMethod;
use TgBotApi\BotApiBase\Method\GetMeMethod;
use TgBotApi\BotApiBase\Method\GetUpdatesMethod;
use TgBotApi\BotApiBase\Method\GetUserProfilePhotosMethod;
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
use TgBotApi\BotApiBase\Type\ChatMemberType;
use TgBotApi\BotApiBase\Type\ChatType;
use TgBotApi\BotApiBase\Type\FileType;
use TgBotApi\BotApiBase\Type\MessageType;
use TgBotApi\BotApiBase\Type\UpdateType;
use TgBotApi\BotApiBase\Type\UserProfilePhotosType;
use TgBotApi\BotApiBase\Type\UserType;

class ApiTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testGetUpdates()
    {
        $method = GetUpdatesMethod::create();

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(UpdateType::class . '[]'))
            ->willReturn([]);

        $bot->getUpdates($method);
    }

    public function testGetMe()
    {
        $method = GetMeMethod::create();

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(UserType::class))
            ->willReturn(new UserType());

        $bot->getMe($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendMessage()
    {
        $method = SendMessageMethod::create('id', 'text');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendMessage($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testforwardMessage()
    {
        $method = ForwardMessageMethod::create('id', 'id', 1);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->forwardMessage($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendPhoto()
    {
        $method = SendPhotoMethod::create('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendPhoto($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendAudio()
    {
        $method = SendAudioMethod::create('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendAudio($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendDocument()
    {
        $method = SendDocumentMethod::create('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendDocument($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendVideo()
    {
        $method = SendVideoMethod::create('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVideo($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendAnimation()
    {
        $method = SendAnimationMethod::create('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendAnimation($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendVoice()
    {
        $method = SendVoiceMethod::create('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVoice($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendVideoNote()
    {
        $method = SendVideoNoteMethod::create('id', 'url');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVideoNote($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendMediaGroup()
    {
        $method = SendMediaGroupMethod::create('id', []);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class . '[]'))
            ->willReturn([]);

        $bot->sendMediaGroup($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendLocation()
    {
        $method = SendLocationMethod::create('id', 0.1, 0.1);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendLocation($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendVenue()
    {
        $method = SendVenueMethod::create('id', 0.1, 0.1, 'title', 'address');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendVenue($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testSendContact()
    {
        $method = SendContactMethod::create('id', 'phone number', 'first name');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(MessageType::class))
            ->willReturn(new MessageType());

        $bot->sendContact($method);
    }

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     */
    public function testGetUserProfilePhotos()
    {
        $method = GetUserProfilePhotosMethod::create(1);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(UserProfilePhotosType::class))
            ->willReturn(new UserProfilePhotosType());

        $bot->getUserProfilePhotos($method);
    }

    public function testGetFile()
    {
        $method = GetFileMethod::create('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(FileType::class))
            ->willReturn(new FileType());

        $bot->getFile($method);
    }

    public function testGetChat()
    {
        $method = GetChatMethod::create('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatType::class))
            ->willReturn(new ChatType());

        $bot->getChat($method);
    }

    public function testGetChatAdministrators()
    {
        $method = GetChatAdministratorsMethod::create('id');

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMemberType::class . '[]'))
            ->willReturn([]);

        $bot->getChatAdministrators($method);
    }

    public function testGetChatMember()
    {
        $method = GetChatMemberMethod::create('id', 1);

        $bot = $this->getBotMock();
        $bot->expects($this->once())
            ->method('call')
            ->with($this->equalTo($method), $this->equalTo(ChatMemberType::class))
            ->willReturn(new ChatMemberType());

        $bot->getChatMember($method);
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    private function getBotMock(): \PHPUnit\Framework\MockObject\MockObject
    {
        return $this->getMockBuilder(BotApiHelper::class)
            ->disableOriginalConstructor()
            ->setMethods(['call'])
            ->getMock();
    }
}
