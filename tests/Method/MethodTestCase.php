<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\ApiClientInterface;
use TgBotApi\BotApiBase\BotApiComplete;
use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\BotApiRequestInterface;

abstract class MethodTestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $methodName
     * @param $request
     * @param array $result
     * @param array $serialisedFields
     *
     * @return BotApiComplete
     */
    protected function getBot($methodName, $request, $result = [], $serialisedFields = []): BotApiComplete
    {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->with(
                $methodName,
                $this->callback(function (BotApiRequestInterface $botApiRequest) use ($request, $serialisedFields) {
                    $query = $botApiRequest->getData();
                    foreach ($serialisedFields as $serializedField) {
                        $query[$serializedField] = \json_decode($query[$serializedField], true);
                    }
                    $this->assertEquals($request, $query);

                    return true;
                })
            )
            ->willReturn((object) (['ok' => true, 'result' => $result]));

        /* @var ApiClientInterface $stub */
        return new BotApiComplete('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, new BotApiNormalizer());
    }

    /**
     * @param $methodName
     * @param $request
     * @param array $fileMap
     * @param array $serializableFields
     * @param array $result
     *
     * @return BotApiComplete
     */
    protected function getBotWithFiles(
        $methodName,
        $request,
        array $fileMap,
        array $serializableFields = [],
        $result = []
    ): BotApiComplete {
        $stub = $this->getMockBuilder(ApiClientInterface::class)
            ->getMock();

        $stub->expects($this->once())
            ->method('send')
            ->with(
                $methodName,
                $this->callback(
                    function (BotApiRequestInterface $botApiRequest) use ($request, $fileMap, $serializableFields) {
                        $request = $this->buildFileTree($botApiRequest->getFiles(), $request, $fileMap);
                        $data = $botApiRequest->getData();
                        foreach ($serializableFields as $field) {
                            $this->assertIsString($data[$field]);
                            $data[$field] = \json_decode($data[$field], true);
                        }
                        $this->assertEquals($request, $data);

                        return true;
                    }
                )
            )
            ->willReturn((object) (['ok' => true, 'result' => $result]));

        /* @var ApiClientInterface $stub */
        return new BotApiComplete('000000000:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', $stub, new BotApiNormalizer());
    }

    /**
     * @param array $files
     * @param array $request
     * @param array $map
     * @param int   $pointer
     *
     * @return array
     */
    private function buildFileTree($files, &$request, $map, &$pointer = 0): array
    {
        foreach ($map as $key => $field) {
            if (\is_array($field)) {
                $request[$key] = $this->buildFileTree($files, $request[$key], $field, $pointer);
            } else {
                $request[$key] = 'attach://' . \array_keys($files)[$pointer];
                ++$pointer;
            }
        }

        return $request;
    }
}
