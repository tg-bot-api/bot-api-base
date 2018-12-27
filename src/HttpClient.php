<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot;

use Greenplugin\TelegramBot\Type\InputFileType;
use Nyholm\Psr7\Request;
use Psr\Http\Client\ClientInterface;

class HttpClient implements HttpClientInterface
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function get(string $path)
    {
        $request = new Request('GET', $path);

        $response = $this->client->sendRequest($request);

        return \json_decode($response->getBody()->getContents());
    }

    public function post(string $path, array $data)
    {
        $request = new Request('POST', $path, ['Content-Type' => 'application/json'], \json_encode($data));

        $response = $this->client->sendRequest($request);

        return \json_decode($response->getBody()->getContents());
    }

    public function form(string $path, array $data)
    {
        $boundary = uniqid('', true);
        $headers = [];
        $headers['Content-Type'] = 'multipart/form-data; boundary="'.$boundary.'"';
        $body = '';
        $files = '';
        foreach ($data as $name => $value) {
            if (isset($value['path'])) {
                $fileContent = file_get_contents($value['path']);
                $files .= $this->prepareMultipart($name, $fileContent, $boundary, $value);
            } else {
                $files .= $this->prepareMultipart($name, (string)$value, $boundary);
            }
        }

        $body = "$files--{$boundary}--\r\n";

        $request = new Request('POST', $path, $headers, $body);

        $response = $this->client->sendRequest($request);

        $content = $response->getBody()->getContents();

        return \json_decode($content);
    }

    private function prepareMultipart(string $name, string $content, string $boundary, array $data = []): string
    {
        $output = '';
        $fileHeaders = [];
        // Set a default content-disposition header
        $fileHeaders['Content-Disposition'] = sprintf('form-data; name="%s"', $name);
        if (isset($data['filename'])) {
            $fileHeaders['Content-Disposition'] .= sprintf('; filename="%s"', $data['filename']);
        }
        // Set a default content-length header
        if ($length = \strlen($content)) {
            $fileHeaders['Content-Length'] = (string) $length;
        }
        if (isset($data['contentType'])) {
            $fileHeaders['Content-Type'] = $data['contentType'];
        }
        // Add start
        $output .= "--$boundary\r\n";
        foreach ($fileHeaders as $key => $value) {
            $output .= sprintf("%s: %s\r\n", $key, $value);
        }
        $output .= "\r\n";
        $output .= $content;
        $output .= "\r\n";
        return $output;
    }

}
